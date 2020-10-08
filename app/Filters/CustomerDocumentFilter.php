<?php

namespace App\Filters;
use App\Consumer\PersonPersistence;

class CustomerDocumentFilter {
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
        $createPerson = new PersonPersistence();
        $persistence = $createPerson->sendPersonToDB($arrayTypePerson);
        return $persistence;
    }
}