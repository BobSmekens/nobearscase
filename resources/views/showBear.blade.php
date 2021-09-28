@extends('layouts.master')
@section('content')

<h4>Showing company: {{$bear->company_name}}</h4>
<a href="/index">Return to index</a><br>
@if(Session::has('token'))
<a href="/updatebear/{{$bear->id}}">Update bear here</a><br>

@endif
<div>id: {{$bear->id}}</div>
<div>company name: {{$bear->company_name}}</div>
<div>street: {{$bear->street}}</div>
<div>street_number: {{$bear->street_number}}</div>
<div>postal_code: {{$bear->postal_code}}</div>
<div>city: {{$bear->city}}</div>
<div>country: {{$bear->country}}</div>
<div>latitude: {{$bear->latitude}}</div>
<div>longitude: {{$bear->longitude}}</div>
<div>email: {{$bear->email}}</div>
<div>distance: {{$bear->distance}}</div>

@stop