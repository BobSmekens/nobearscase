<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BearsImport;
use App\Models\Bear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bear::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $request->validate([
        'company_name' => 'required',
        'street' => 'required',
        'street_number' => 'required',
        'postal_code' => 'required',
        'city' => 'required',
        'country' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'email' => 'required'
    ]);

        return Bear::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bear::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bear = Bear::find($id);
        $bear->update($request->all());
        // return $bear;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Bear::destroy($id);
    }

    public function search($name)
    {
        return Bear::where('company_name', 'like', '%' . $name.'%')->get();
    }


    //import data from csv
    public function importForm()
    {
        return view('import');
    }

    public function import() 
    {
        Excel::import(new BearsImport, '..\app\imports\example_locations.csv');
        
        return redirect('/import')->with('success', 'All good!');
    }
}
