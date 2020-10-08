<?php

namespace App\Filters;
use App\Filters\UnsignedClientFilter;

class RemoveDuplicateFilter {
    public function RemoveDuplicate ($sales = []) 
    {
        $totalSales = new \stdClass();
        $totalSales->rejected = [];
        $totalSales->refined = [];
        foreach ($sales as $key => $value) {
            if (count($totalSales->refined) == 0) {
                array_push($totalSales->refined, $value);
            } else {
                foreach ($totalSales->refined as $key_ => $value_) {
                    if ($value->amount == $value_->amount && $value->customer_document == $value_->customer_document) {
                        array_push($totalSales->rejected, $value);
                    } else {
                        array_push($totalSales->refined, $value);
                    }
                }
            }
        }
        $UnsignedClient = new UnsignedClientFilter();
        $filter = $UnsignedClient->removeUnsigned($totalSales);
        
        return $filter;
    }
}