@extends('navbar')

@section('content')
    @if(Session::has('token'))
    <a href="/jsonDownloadClosest">Download table as Json</a>
    <br>
    <a href="/jsonClosest">View table as Json</a>
    <table>
        @if($bearCollection)
        @foreach($bearCollection as $bear)
        <tr>
            <td>{{$bear->company_name}}</td>
            <td>{{$bear->street}}</td>
            <td>{{$bear->street_number}}</td>
            <td>{{$bear->postal_code}}</td>
            <td>{{$bear->city}}</td>
            <td>{{$bear->country}}</td>
            <td>{{$bear->latitude}}</td>
            <td>{{$bear->longitude}}</td>
            <td>{{$bear->email}}</td>
        </tr>
        @endforeach
        @endif
    </table>
    @else
    You are not logged in
@endif
@stop