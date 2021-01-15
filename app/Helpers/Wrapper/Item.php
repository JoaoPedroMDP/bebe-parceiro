<?php

namespace App\Helpers\Wrapper;

class Item{
    protected $values = [];

    public function __constructor($array){
        foreach($array as $item => $key){
            $this->setValue($key, $item);
        }
    }

    public function setValue($key, $value){
        $this->values[$key] = $value;
    }

    public function unsetValue($key){
        unset($this->values[$key]);
    }
}