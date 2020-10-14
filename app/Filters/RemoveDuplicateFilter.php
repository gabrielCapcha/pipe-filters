<?php

namespace App\Filters;
use App\Filters\UnsignedClientFilter;

class RemoveDuplicateFilter {
    public function RemoveDuplicate ($sales = []) 
    {
        $totalSales = new \stdClass();
        $totalSales->rejected = [];
        $totalSales->refined = [];
        $temp_array = array();
        foreach((array)$sales as $key => $val) {
            if (!in_array($val->amount, $temp_array)) {
                array_push($temp_array, $val->amount);
                array_push($totalSales->refined, $val);
            } else {
                array_push($totalSales->rejected, $val);
            }
        }
        $UnsignedClient = new UnsignedClientFilter();
        $filter = $UnsignedClient->removeUnsigned($totalSales);
        
        return $filter;
    }
}