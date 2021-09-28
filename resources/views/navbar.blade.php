@extends('layouts.master')

@section('navbar')

@if(Session::has('token'))


<div>
    <a href="/logoutUser">logout</a>
    <a href="/index">bearIndex</a>
    <a href="/sortclosest">Closest bears</a>
    <a href="/sortfurthest">Furthest bears</a>

    <a href="/import">Import</a>
</div>

@else

<div>
    <a href="/registerUser">register</a>
    <a href="loginUser">login</a>
</div>
@endif