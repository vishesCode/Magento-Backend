<?php

namespace NewVendor\CustomModule\Block;
// use Magento\Framework\Data\Form as Form;
use \Magento\Framework\UrlInterface;

class Index extends \Magento\Framework\View\Element\Template{
    
    public function getText(){
        // echo $this->url->getUrl();
        return "Hello World2";
    }
}