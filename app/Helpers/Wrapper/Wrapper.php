<?php

namespace App\Helpers\Wrapper;

use App\Helpers\Wrapper\Item;

class Wrapper{

    public static $items = [];

    public static function wrapGuardianPagination($array){
        $items = $array->items();
        foreach($items as $item){
            $item = new Item(
                collect( 
                    $item->toArray()
                )->except(
                    'updated_at', 'created_at'
                )->all()
            );

            self::pushItem($item);
        }
        return self::$items;
    }

    public static function pushItem(Item $item){
        self::$items[] = $item->toArray();
    }
}