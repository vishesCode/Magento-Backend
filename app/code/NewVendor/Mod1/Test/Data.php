<?php

namespace NewVendor\Mod1\Test;

use NewVendor\Mod1\Test\CustomClass;

class Data
{
    protected $array;
    protected $string;
    protected CustomClass $custom;
    public function __construct(CustomClass $customClass, $array = [2, 3, 4], $string = "hello")
    {
        $this->array = $array;
        $this->custom = $customClass;
        $this->string = $string;
    }

    public function displayParams()
    {
        print_r($this->array);
    }
}
