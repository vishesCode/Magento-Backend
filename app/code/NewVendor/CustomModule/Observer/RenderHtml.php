<?php

namespace NewVendor\CustomModule\Observer;

use Psr\Log\LoggerInterface;


class RenderHtml implements \Magento\Framework\Event\ObserverInterface
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
        {
            $this->logger = $logger;
        }
    
    public function execute(\Magento\Framework\Event\Observer $observer): void
    {
        $html = $observer->getEvent()->getData('response')->getBody();
        // echo \htmlspecialchars($html);
        // $this->logger->info("Product Viewed:". $productName);
        $this->logger->info("Html".$html);
    }
}
