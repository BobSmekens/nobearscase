<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Bear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    public function bearTable()
    {
        $bear = Bear::all();
        $bear->shift();
        $bearJson = $bear->toJson();
        // return $bearJson;

        // return response()->download("storage\app\public\bears.json");

        Storage::disk('public')->put('bears.json', $bearJson);

        return view('json', [
            'bearCollection' => $bearJson,
            'downloadReady' => "download ready"
        ]);
        // return view('json', ['bearCollection' => $bearJson]);
    }

    public function bearJson()
    {
        $bear = Bear::all();
        $bear->shift();
        $bearJson = $bear->toJson();
        return $bearJson;
    }

    public function downloadJson()
    {

        $file = public_path() . "/storage/bears.json";

        $headers = ['Content-Type: application/json'];

        if (file_exists($file)) {
            return \Response::download($file, 'bears.json', $headers);
        } else {
            echo ('File not found.');
        }
    }
}
