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

        return back()->with('uploaded', 'upload is completed');
    }
    public function resetTable()
    {

        $file = public_path() . "/storage/example_locations.csv";
        DB::table('bears')->truncate();
        Excel::import(new BearsImport, $file);

        return back()->with('uploaded', 'reset is completed');
    }


}
