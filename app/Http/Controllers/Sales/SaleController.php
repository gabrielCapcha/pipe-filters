<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\SaleImport;
use App\Producer\ExcelImport;
use DB;
use Excel;

class SaleController extends Controller
{
    public function excelImport($request)
    {
        $data = Excel::toArray(new SaleImport , $request, null, 'Xlsx');
        $sourceFilter = new ExcelImport();
        $map = $sourceFilter->importSales($data);
        
        return $map;
    }
}
