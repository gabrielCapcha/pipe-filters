<?php

namespace App\Consumer;
use App\Models\RejectSales;

class RejectSalesPersistanse {
    public function sendSalesToDB($people= [])
    {
        $count = 1;
        foreach ($people as $key => $value) {
            RejectSales::create((array)$value);
            $count = $count + 1;
        }
        return $count;
    }
}