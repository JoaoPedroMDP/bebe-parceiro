<?php

namespace App\Helpers\Wrapper;

class Item{
    protected $values = [];

    public function __construct($array){
        foreach($array as $key => $item){
            $this->setValue($key, $item);
        }
    }

    public function setValue($key, $value){
        $this->values[$key] = $value;
    }

    public function unsetValue($key){
        unset($this->values[$key]);
    }

    public function toArray(){
        return $this->values;
    }
}