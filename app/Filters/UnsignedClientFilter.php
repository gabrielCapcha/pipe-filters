<?php

namespace App\Filters;
use App\Filters\RemoveAmountZeroFilter;

class UnsignedClientFilter {
    public function removeUnsigned ($sales = [])
    {
        foreach ($sales->refined as $key => $value) {
            if (is_null($value->customer_document)) {
                array_push($sales->rejected, $value);
                unset($sales->rejected[$key]);
            }
        }
        $RemoveAmountZero = new RemoveAmountZeroFilter();
        $filter = $RemoveAmountZero->removeAmountZero($sales);
        return $filter;
    }
}