<?php

namespace App\Consumer;
use App\Models\Sales;

class RejectSalesPersistanse {
    public function sendSalesToDB($people= [])
    {
        foreach ($people as $key => $value) {
            
            Sales::create((array)$value);
        }
        return 'Carga exitosa';
    }
}