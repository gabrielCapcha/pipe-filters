<?php

namespace App\Filters;
use App\Consumer\RefinedSalesPersistanse;
use App\Consumer\RejectSalesPersistanse;

class CustomerDocumentFilter {
    public function customerDocument($sales = [])
    {
        foreach ($sales->refined as $key => $value) {
            if (str_split($value->customer_document, 2) === 10) {
                $value->type_person = 'NATURAL CON NEGOCIO';
            } elseif (str_split($value->customer_document, 2) === 20) {
                $value->type_person = 'EMPRESA';
            }
        }
        $createPerson = new RefinedSalesPersistanse();
        $persistenceRefined = $createPerson->sendPersonToDB($sales->refined);
        $createPerson = new RejectSalesPersistanse();
        $persistenceRejected = $createPerson->sendPersonToDB($sales->rejected);
        return $response = [
            'rejected' => $persistenceRejected,
            'refined' => $persistenceRefined
        ];
    }
}