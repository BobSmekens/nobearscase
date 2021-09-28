@extends('navbar')

@section('content')

    <a href="/jsonDownload">Download table as Json</a>
    <br>
    <a href="/json">View table as Json</a>

    <form action="/sortclosest" method="get">
    <div>Search nearest bears!</div>
    @csrf
    <label for="latitude">Your Latitude:</label>
    <input type="search" name="latitude">

    <label for="longitude">Your longitude:</label>
    <input type="search" name="longitude">
    <button>Filter</button>
    </form>
    <table class="table table-dark">
        @if($bearCollection)
        <tr style="font-weight: 600;">
            <td>company_name</td>
            <td>id</td>
            <td>street</td>
            <td>street_number</td>
            <td>postal_code</td>
            <td>city</td>
            <td>country</td>
            <td>latitude</td>
            <td>longitude</td>
            <td>distance</td>
            <td>email</td>
        </tr>
        @foreach($bearCollection as $bear)
        
        <tr>
            <td><a style="text-decoration: none; font-weight: 600;" href="/bear/{{$bear->id}}">{{$bear->company_name}}</a></td>
            <td>{{$bear->id}}</td>
            <td>{{$bear->street}}</td>
            <td>{{$bear->street_number}}</td>
            <td>{{$bear->postal_code}}</td>
            <td>{{$bear->city}}</td>
            <td>{{$bear->country}}</td>
            <td>{{$bear->latitude}}</td>
            <td>{{$bear->longitude}}</td>
            <td>{{round($bear->distance*100)}} km</td>
            <td>{{$bear->email}}</td>
        </tr>
        @endforeach
        @endif
    </table>

@stop