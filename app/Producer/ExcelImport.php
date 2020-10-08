<?php

namespace App\Producer;

use App\Imports\PeopleImport;
use App\Filters\RemoveDuplicateFilter;
use Excel;

class ExcelImport {
    public function importSales($data = []) 
    {
        $array = [];
        $header = [];
        foreach ($data[0] as $key => $value) {
            $jsonObject = new \stdClass();
            if ((int)$key === 0) {
                $header = $value;
            }  else {
                foreach ($header as $key_ => $value_) {
                    if ((int)$key_ == 4 || (int)$key_ == 5 ) {
                        $jsonObject->$value_ = date('d-m-Y',$value[$key_]);
                    } else {
                        $jsonObject->$value_ = $value[$key_];
                    }
                }
                array_push($array, $jsonObject);
            }
        }
        $removeDuplicate = new RemoveDuplicateFilter();
        $template = $removeDuplicate->removeDuplicate($array);

        return $template;
    }
}