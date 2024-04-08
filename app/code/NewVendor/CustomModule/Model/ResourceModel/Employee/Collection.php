<?php

namespace NewVendor\CustomModule\Model\ResourceModel\Employee;

use NewVendor\CustomModule\Model\Employee;
// use NewVendor\CustomModule\Model\ResourceModel\Employee;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Employee::class, NewVendor\CustomModule\Model\ResourceModel\Employee::class);
    }
}