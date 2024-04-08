<?php
namespace NewVendor\CustomModule\Plugin;
use Magento\Framework\App\Router\NoRouteHandler;

class NoRoute
{
    public function afterExecute(NoRouteHandler $subject, $result)
    {
        dump($result);
           
        
    }
}
