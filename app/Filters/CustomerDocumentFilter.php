<?php

namespace App\Filters;
use App\Consumer\RefinedSalesPersistanse;
use App\Consumer\RejectSalesPersistanse;

class CustomerDocumentFilter {
    public function customerDocument($sales = [])
    {
        foreach ($sales->refined as $key => $value) {
            $firstChar = str_split($value->customer_document, 2);
            if ($firstChar[0] == 10) {
                $value->type_person = 'NATURAL CON NEGOCIO';
            } elseif ($firstChar[0] == 20) {
                $value->type_person = 'EMPRESA';
            }
        }
        $createSale = new RefinedSalesPersistanse();
        $persistenceRefined = $createSale->sendSalesToDB($sales->refined);
        $createSale = new RejectSalesPersistanse();
        $persistenceRejected = $createSale->sendSalesToDB($sales->rejected);
        return $response = [
            'rejected' => $persistenceRejected,
            'refined' => $persistenceRefined
        ];
    }
}