@extends('layouts.master')

@section('navbar')

@if(Session::has('token'))


<div>
    <a href="/logoutUser" class="nav-link">logout</a>

    <a href="/import" class="nav-link">Import</a>
    <a href="/createbear" class="nav-link">Create Bear</a>
</div>

@else

<div>
    <a href="/registerUser" class="nav-link">register</a>
    <a href="loginUser" class="nav-link">login</a>

</div>
@endif

<a href="/index" class="nav-link">bearIndex</a>
<a href="/sortclosest" class="nav-link">Closest bears</a>
<a href="/sortfurthest" class="nav-link">Furthest bears</a>