<?php

namespace NewVendor\CustomModule\Plugin;

use Magento\Catalog\Model\Product as Product;


class Description{
   

    public function afterToHtml(\Magento\Catalog\Block\Product\View\Description $subject, $result){
        
        $result.="This is a sample description for the product description";
        return $result;
    }
}
