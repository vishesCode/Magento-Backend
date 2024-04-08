define([
    'jquery',
    'underscore',
    'mageUtils',
    'Magento_Ui/js/modal/alert',
    'Magento_Ui/js/lib/validation/validator',
    'Magento_Ui/js/form/element/abstract',
    'mage/backend/notification',
    'mage/translate',
    'jquery/file-uploader',
    'mage/adminhtml/tools'
], function ($, _, utils, uiAlert, validator, Element, notification, $t) {
    'use strict';

    return function (target) {
        return target.extend({

                /**
             * Defines initial value of the instance.
             *
             * @returns {FileUploader} Chainable.
             */
            setInitialValue: function () {
                var value = this.getInitialValue();

                if(typeof value === 'string' || value instanceof String){
                    this.value(JSON.parse(value));
                    return this;
                }

                value = value.map(this.processFile, this);

                this.initialValue = value.slice();

                this.value(value);
                this.on('value', this.onUpdate.bind(this));
                this.isUseDefault(this.disabled());

                return this;
            },
            getFilePreview: function (file) {
                if (file.type.match('video')) {
                var inputElement = document.querySelector('input[name="video_source"]');
                    if(inputElement){
                        inputElement.value = file.url;
                        var event = new Event('change', {
                            bubbles: true,
                            cancelable: true,
                        });
                        inputElement.dispatchEvent(event);
                        inputElement.disabled = true;
                    }

                }
                
                return file.url;
            },
            removeFile: function (file) {
                if (file.type.match('video')){
                    let formData = new FormData(), deleteUrl;
                    deleteUrl = this.uploaderConfig.url.replace('video_upload', 'video_delete');
                    formData.append('filename', file.full_path);
                    fetch(deleteUrl + '?isAjax=true', {
                                  method: 'POST',
                                  body: formData
                                }); 
                    var inputElement = document.querySelector('input[name="video_source"]');
                    if(inputElement){
                        inputElement.value = '';
                        var event = new Event('change', {
                            bubbles: true,
                            cancelable: true,
                        });
                        inputElement.dispatchEvent(event);
                        inputElement.disabled = false;
                    }

                }
                this._super();
                   
            }                
                           
        });
    };
});
