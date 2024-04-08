<?php

namespace NewVendor\Mod1\Controller\Index;

use NewVendor\Mod1\Test\Data;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Data
     */
    protected $test;
    /**
     * @param Data $data
     * 
     */
    public function __construct(\Magento\Framework\App\Action\Context $context, Data $test)
    {
        $this->test = $test;
        return parent::__construct($context, $test);
    }

    public function execute()
    {
        echo "Hello World";
        $this->test->displayParams();
    }
}
