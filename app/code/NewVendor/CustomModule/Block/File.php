<?php

namespace NewVendor\CustomModule\Block;
// use Magento\Framework\Data\Form as Form;
use \Magento\Framework\UrlInterface;

class File extends \Magento\Framework\View\Element\Template{
    
    public function getText1(){
        // echo $this->url->getUrl();
        return "Hello World from File";
    }
}