<?php

namespace NewVendor\CustomModule\Block;

class Override extends \Magento\Framework\View\Element\Template{
   
    protected function _toHtml(){
        echo "<div>Hello this is coming from to html</div>";
    }

    protected function _afterToHtml($html){
        return $html. "Some extra content";
    }
}