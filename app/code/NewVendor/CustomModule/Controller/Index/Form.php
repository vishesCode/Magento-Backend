<?php

namespace NewVendor\CustomModule\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Form extends \Magento\Framework\App\Action\Action{
    protected $urlinterface;
    public function __construct(\Magento\Framework\App\Action\Context $context, 
    \Magento\Framework\View\Result\PageFactory $pageFactory){
        $this->_pageFactory=$pageFactory;
        
        return parent::__construct($context);
      
        
    }

    public function execute(){  
        die("hello");
        return $this->_pageFactory->create();
        

    }
}