@extends('navbar')

@section('content')
@if(Session::has('token'))
<form action="/createbear" method="post">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger">{{Session::get('failed')}}</div>
    @endif

    @if(Session::has('deleteMessage'))
    <div class="alert alert-success">{{Session::get('deleteMessage')}}</div>
    @endif

    @csrf


    </div>
    <input style="margin: 10px;" type="text" name="company_name" placeholder="company name "><br>
    <input style="margin: 10px;" type="text" name="street" placeholder="street "><br>
    <input style="margin: 10px;" type="text" name="street_number" placeholder="street_number "><br>
    <input style="margin: 10px;" type="text" name="postal_code" placeholder="postal_code "><br>
    <input style="margin: 10px;" type="text" name="city" placeholder="city "><br>
    <input style="margin: 10px;" type="text" name="country" placeholder="country "><br>
    <input style="margin: 10px;" type="text" name="latitude" placeholder="latitude "><br>
    <input style="margin: 10px;" type="text" name="longitude" placeholder="longitude "><br>
    <input style="margin: 10px;" type="text" name="email" placeholder="email "><br>

    <div class="form-group">
        <button class="btn btn-block btn-primary" type="submit">Create bear</button>
    </div>
</form>
@else
You are not logged in
@endif
@stop