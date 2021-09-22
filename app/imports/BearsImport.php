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
        'company_name' =>$row[0],
        'street' =>$row[1],
        'street_number' =>$row[2],
        'postal_code' =>$row[3],
        'city' =>$row[4],
        'country' =>$row[5],
        'latitude' =>$row[6],
        'longitude' =>$row[7],
         'email' =>$row[8]
        ]);
    }
}
