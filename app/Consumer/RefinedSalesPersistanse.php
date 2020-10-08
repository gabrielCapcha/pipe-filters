<?php

namespace App\Consumer;
use App\Models\Sales;

class RefinedSalesPersistanse {
    public function sendSalesToDB($people= [])
    {
        $count = 1;
        foreach ($people as $key => $value) {
            Sales::create((array)$value);
            $count = $count + 1;
        }
        return $count;
    }
}