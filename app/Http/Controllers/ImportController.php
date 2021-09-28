<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bear;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BearsImport;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    //import data from csv
    public function importForm()
    {
        return view('import');
    }

    public function import()
    {

        DB::table('bears')->truncate();
        Excel::import(new BearsImport, request()->file('file'));

        $bearCollection = Bear::all();
        foreach($bearCollection as $bear){
            // echo $bear->email;
            // echo $bear->longitude;
            
            $bearLatitude = $bear->latitude;
            $bearLatitudeInt = (double)$bearLatitude;
            // echo $bearLatitudeInt;
            $bearLongitude = $bear->longitude;
            $bearLongitudeInt = (double)$bearLongitude;
            $bearDistance = sqrt(($bearLongitudeInt*$bearLongitudeInt + $bearLatitudeInt*$bearLatitudeInt));
            $bear->distance = $bearDistance;
            echo $bear->distance;
        };

        return back()->with('uploaded', 'upload is completed');
    }


}
