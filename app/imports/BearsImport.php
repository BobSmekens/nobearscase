<?php

namespace App\Imports;

use App\Models\Bear;
use Maatwebsite\Excel\Concerns\ToModel;

class BearsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bear([
        'company_name' =>$row[1],
        'street' =>$row[2],
        'street_number' =>$row[3],
        'postal_code' =>$row[4],
        'city' =>$row[5],
        'country' =>$row[6],
        'latitude' =>$row[7],
        'longitude' =>$row[8],
         'email' =>$row[9]
        ]);
    }
}
