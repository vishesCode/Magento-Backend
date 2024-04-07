<?php

namespace NewVendor\CustomModule\Block;

use \Magento\Framework\UrlInterface;

class Form extends \Magento\Framework\View\Element\Template{
    
    public function name(){
        echo "Hello Name!";
    }
}