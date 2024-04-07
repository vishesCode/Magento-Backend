<?php

namespace NewVendor\CustomModule\Block;


class Message extends \Magento\Framework\View\Element\Template{
    
    public function getMessage(){
        
        echo "Custom Message for product page";
    }
}