@extends('navbar')

@section('content')

    <a href="/jsonDownload">Download table as Json</a>
    <br>
    <a href="/json">View table as Json</a>
    <table class="table table-dark">
        @if($bearCollection)
        @foreach($bearCollection as $bear)
        <tr>
            <td><a style="text-decoration: none; font-weight: 600;" href="/bear/{{$bear->id}}">{{$bear->company_name}}</a></td>

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

@stop