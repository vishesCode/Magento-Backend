<?php

namespace NewVendor\CustomModule\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\Response\HttpInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Page\Title;
use Magento\Framework\HTTP\Header;
class ControllerActionPredispatch implements \Magento\Framework\Event\ObserverInterface
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger, Context $context, Header $header, ResultFactory $result)

    {
        $this->result = $result;
        $this->header=$header;
        $this->context = $context;
        $this->logger = $logger;
       
        
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo $observer->getEvent()->getData('title');
        // var_dump($this->context->getResponse()->getHttpResponseCode());
        // var_dump($this->context->getResponse()->getHeader());
        if($this->header->getRequestUri()=="/contactuspage.html"){
            $resultRedirect = $this->result->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/contact');
        }
        // echo $this->header->getRequestUri();
        if($this->context->getResponse()->getHttpResponseCode() == 404){
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/');
            return $resultRedirect;
        }
        $this->logger->info($this->context->getResponse()->getHttpResponseCode());

        $this->logger->info("Controller");
    }
}
