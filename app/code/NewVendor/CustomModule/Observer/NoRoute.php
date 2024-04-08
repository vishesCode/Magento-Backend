<?php

namespace NewVendor\CustomModule\Observer;

use Psr\Log\LoggerInterface;


class NoRoute implements \Magento\Framework\Event\ObserverInterface
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    public function execute(\Magento\Framework\Event\Observer $observer): void
    {
        die("Observer executed");
        $request = $observer->getRequest();
        echo $request->getModuleName();
        $this->logger->info("No Route Found");
    }
}
