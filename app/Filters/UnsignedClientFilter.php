<?php

namespace App\Filters;
use App\Filters\RemoveAmountZeroFilter;

class UnsignedClientFilter {
    public function removeUnsigned ($people = [])
    {
        $newArrayPeople = [];
        foreach ($people as $key => $value) {
            $newPerson = new \stdClass();
            $nameAndLastName = explode(" ", $value->names);

            $newPerson->name = $nameAndLastName[0];
            $newPerson->lastname = $nameAndLastName[1];
            $newPerson->document = $value->document;
            $newPerson->city = is_null($value->city) ? 'DESCONOCIDO' : $value->city;
            array_push($newArrayPeople, $newPerson);
        }
        $RemoveAmountZero = new RemoveAmountZeroFilter();
        $filter = $RemoveAmountZero->removeAmountZero($newArrayPeople);
        return $filter;
    }
}