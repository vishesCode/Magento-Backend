<?php

namespace NewVendor\CustomModule\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\HTTP\Header;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends \Magento\Framework\App\Action\Action{
    protected $urlinterface;
    public function __construct(\Magento\Framework\App\Action\Context $context, 
    \Magento\Framework\View\Result\PageFactory $pageFactory, Header $header, ScopeConfigInterface $scope){
        $this->_pageFactory=$pageFactory;
        $this->header=$header;
        $this->scope=$scope;
        return parent::__construct($context);
        $this->urlinterface=$urlInterface;
        
    }

    public function execute(){ 
         
        // $responseCode= $this->getResponse()->getHTTPResponseCode();
        // if($responseCode==200){
        //     $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        // $resultRedirect->setUrl('/'); // Replace with the actual Contact Us URL
        // return $resultRedirect;
        // }
        // echo $this->urlinterface->getCurrentUrl();
        // echo "Hello World, I'm here";
        echo $this->header->getRequestUri()."<br/>";
        // echo $this->header->getHttpHost()."<br/>";
        // if($this->header->getRequestUri()=='/hello'){
        //     $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        // $resultRedirect->setUrl('/helloworld'); // Replace with the actual Contact Us URL
        //  return $resultRedirect;
        // }
        $enable = $this->scope->getValue('mod9/customconfig_group/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        
        echo "Enable value:". $enable." <br/>";
        if($enable){
        $text = $this->scope->getValue('mod9/customconfig_group/text_to_display', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            echo "Mod9 text:". $text;
        }
        
        return $this->_pageFactory->create();
        

    }
}