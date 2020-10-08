<?php

namespace App\Filters;
use App\Filters\CustomerDocumentFilter;

class RemoveAmountZeroFilter {
    public function removeAmountZero($people = [])
    {
        $arrayTypePerson = [];
        foreach ($people as $key => $value) {
            if (strlen($value->document) === 8) {
                $value->type_person = 'NATURAL';
                array_push($arrayTypePerson, $value);
            } elseif (strlen($value->document) === 11) {
                $value->type_person = 'JURIDICA';
                array_push($arrayTypePerson, $value);
            }
        }
        $CustomerDocument = new CustomerDocumentFilter();
        $persistence = $CustomerDocument->sendPersonToDB($arrayTypePerson);
        return $persistence;
    }
}