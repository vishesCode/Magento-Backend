<?php

namespace NewVendor\CustomModule\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel {

    protected function _construct(){
        $this->_init('NewVendor\CustomModule\Model\ResourceModel\Employee'::class);
    }
}