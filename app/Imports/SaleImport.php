<?php

namespace App\Imports;

use App\Sales;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaleImport implements FromCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection()
    {   
        return Sales::all();
    }
}
