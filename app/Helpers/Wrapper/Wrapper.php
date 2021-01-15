<?php

namespace App\Helpers\Wrapper;
use Item;
class Wrapper{

    protected $items = [];

    public static function wrapGuardianPagination($paginatedGuardians){
        $items = $paginatedGuardians->items();
        foreach($items as $item){
            $newItem = new Item([
                //TODO preciso extrair os campos e colocar dentro desse array
            ]);

            $this->items
        }
        dd($justUsefulItems);
    }
}