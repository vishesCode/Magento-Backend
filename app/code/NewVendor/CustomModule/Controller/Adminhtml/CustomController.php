<?php

namespace NewVendor\CustomModule\Controller\Adminhtml;

use Magento\Backend\App\Action;

class CustomController extends Action
{
    public function execute()
    {
        $access = $this->getRequest()->getParam('access', false);
        if ($access === 'True') {
            // Your controller logic goes here
            $this->_view->loadLayout();
            $this->_view->renderLayout();
        } else {
            // Redirect or show an error message
            $this->messageManager->addErrorMessage(__('Access denied.'));
            $this->_redirect('*/*/');
        }
    }
}
