<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Adrianorosa\GeoLocation\GeoLocation;
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
        return Bear::where('id', '>', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeShow()
    {
        return view('createBear');
    }

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

        $bear = Bear::firstOrCreate([
            'company_name' => $request->company_name,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country' => $request->country,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'email' => $request->email
        ]);

        $bear->save();

        return redirect('/bear/' . $bear->id);

        // return Bear::create($request->first('email'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bear = Bear::find($id);

        return view('showBear', ['bear' => $bear]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showUpdate($id)
    {
        $bear = Bear::find($id);
        return view('updateBear', ['bear' => $bear]);
    }

    public function update(Request $request, $id)
    {
        $bear = Bear::find($id);

        $bear->company_name = $request->company_name;
        $bear->street = $request->street;
        $bear->street_number = $request->street_number;
        $bear->postal_code = $request->postal_code;
        $bear->city = $request->city;
        $bear->country = $request->country;
        $bear->latitude = $request->latitude;
        $bear->longitude = $request->longitude;
        $bear->email = $request->email;

        $bear->save();

        return redirect('/bear/' . $bear->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "destroy activate";
        $bear = Bear::find($id);
        $bear->delete();
        return redirect('/index');
    }

    public function searchBear(Request $request)
    {
        $search = $request->search;
        $bear = Bear::where('company_name', 'like', '%' . $search . '%')->get();

        return view('index', ['bearCollection' => $bear]);
    }


    public function bearIndex()
    {
        $bear = Bear::all()->where('id', '>', 1);

        $bearCollection = $bear;

        return view('index', ['bearCollection' => $bearCollection]);
    }

    public function sortClosest(Request $request)
    {
        ////////////////check if search request//////////
        if ($request->latitude !=0 && $request->longitude != 0) {
            $clientLatitude = (double)$request->latitude;
            $clientLongitude = (double)$request->longitude;
        } else {

            /////get clients ip//////////////////
            $clientIp = $request->ip();

            ////////////////////static ip for developing/////////
            $clientIp = '84.104.140.247';

            $details = GeoLocation::lookup($clientIp);

            $clientLatitude = $details->getLatitude();
            $clientLongitude = $details->getLongitude();
        };

        $clientLatitudeInt = (double)$clientLatitude;
        $clientLongitudeInt = (double)$clientLongitude;

        foreach (Bear::all()->where('id', '>', 1) as $bear) {

            $bearLatitude = $bear->latitude;
            $bearLatitudeInt = (double)$bearLatitude;
            $bearLatitudeDistance = $clientLatitudeInt - $bearLatitudeInt;

            $bearLongitude = $bear->longitude;
            $bearLongitudeInt = (double)$bearLongitude;
            $bearLongitudeDistance = $clientLongitudeInt - $bearLongitudeInt;
            $bearDistance = sqrt(array_sum([$bearLongitudeDistance * $bearLongitudeDistance, $bearLatitudeDistance * $bearLatitudeDistance]));

            $bear->distance = $bearDistance;

///////////////////////////update table///////////////////////////
            $bear->save();
        };

        $bearCollection = Bear::where('id', '>', 1)->orderBy('distance', 'asc')->get();

        return view('index', ['bearCollection' => $bearCollection]);
    }

    public function sortFurthest(Request $request)
    {
        if ($request->latitude !=0 && $request->longitude != 0) {
            $clientLatitude = (double)$request->latitude;
            $clientLongitude = (double)$request->longitude;
        } else {

            /////get clients ip//////////////////
            $clientIp = $request->ip();

            ////////////////////static ip for developing/////////
            $clientIp = '84.104.140.247';

            $details = GeoLocation::lookup($clientIp);

            $clientLatitude = $details->getLatitude();
            $clientLongitude = $details->getLongitude();
        };

        $clientLatitudeInt = (double)$clientLatitude;
        $clientLongitudeInt = (double)$clientLongitude;

        foreach (Bear::all()->where('id', '>', 1) as $bear) {
            // $bearUpdate = Bear::where('email', $bear->email);

            $bearLatitude = $bear->latitude;
            $bearLatitudeInt = (float)$bearLatitude;
            $bearLatitudeDistance = $clientLatitudeInt - $bearLatitudeInt;

            $bearLongitude = $bear->longitude;
            $bearLongitudeInt = (float)$bearLongitude;
            $bearLongitudeDistance = $clientLongitudeInt - $bearLongitudeInt;
            $bearDistance = sqrt(array_sum([$bearLongitudeDistance * $bearLongitudeDistance, $bearLatitudeDistance * $bearLatitudeDistance]));
            // echo $bearDistance . "<br>";
            $bear->distance = $bearDistance;
            // dd($bear);
            $bear->save();
        };
        $bearCollection = Bear::where('id', '>', 1)->orderBy('distance', 'desc')->get();
        // dd($bearCollection);
        return view('index', ['bearCollection' => $bearCollection]);
    }
}
