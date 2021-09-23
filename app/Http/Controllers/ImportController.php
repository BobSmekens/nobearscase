<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bear;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BearsImport;

class ImportController extends Controller
{
    //import data from csv
    public function importForm()
    {
        return view('import');
    }

    public function import()
    {

        Excel::import(new BearsImport, request()->file('file'));

        // return view('index', [
        //     'succes' => "upload succesfull"
        // ]);
        return back();

        // Excel::import(new BearsImport, '..\app\imports\example_locations.csv');

        // return redirect('/import')->with('success', 'All good!');
    }


}
