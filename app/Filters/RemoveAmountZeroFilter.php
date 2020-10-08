<?php

namespace App\Filters;
use App\Filters\CustomerDocumentFilter;

class RemoveAmountZeroFilter {
    public function removeAmountZero($sales = [])
    {
        foreach ($sales->refined as $key => $value) {
            if ($value->amount < 0) {
                array_push($sales->rejected, $value);
                unset($sales->rejected[$key]);
            }
        }
        $CustomerDocument = new CustomerDocumentFilter();
        $persistence = $CustomerDocument->customerDocument($sales);
        return $persistence;
    }
}