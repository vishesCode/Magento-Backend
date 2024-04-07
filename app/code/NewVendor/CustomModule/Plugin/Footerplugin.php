<?php

namespace NewVendor\CustomModule\Plugin;
use Magento\Theme\Block\Html\Footer as Footer;
use Magento\Theme\Block\Html\Header;
use Magento\Catalog\Model\Product as Product;
class Footerplugin{
    public function afterGetCopyright(Footer $subject, $result){
        $result="My custom footer";
        return $result;
    }

    public function afterGetWelcome(Header $subject, $result): string
    {
        return "Custom Welcome Message!";
    }

    public function afterGetName(Product $subject, $result){

        if($subject->getFinalPrice()<60)
        $result.=" On Sale!";
        return $result;
    }
}
