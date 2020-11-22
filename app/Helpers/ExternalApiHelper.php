<?php

namespace App\Helpers;

Class ExternalApiHelper{
    private $foo;

    public function __construct($foo){
        $this->foo = $foo;

    }

    public function foo(){
        return $this->foo;
    }
}
?>