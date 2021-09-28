@extends('navbar')

@section('content')

@if(Session::has('token'))

<form action="/bear/{{$bear->id}}/update" method="post">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger">{{Session::get('failed')}}</div>
    @endif

    @csrf


    </div>
    <input style="margin: 10px;" value="{{$bear->company_name}}" type="text" name="company_name" placeholder="company name "><br>
    <input style="margin: 10px;" value="{{$bear->street}}" type="text" name="street" placeholder="street "><br>
    <input style="margin: 10px;" value="{{$bear->street_number}}" type="text" name="street_number" placeholder="street_number "><br>
    <input style="margin: 10px;" value="{{$bear->postal_code}}" type="text" name="postal_code" placeholder="postal_code "><br>
    <input style="margin: 10px;" value="{{$bear->city}}" type="text" name="city" placeholder="city "><br>
    <input style="margin: 10px;" value="{{$bear->country}}" type="text" name="country" placeholder="country "><br>
    <input style="margin: 10px;" value="{{$bear->latitude}}" type="text" name="latitude" placeholder="latitude "><br>
    <input style="margin: 10px;" value="{{$bear->longitude}}" type="text" name="longitude" placeholder="longitude "><br>
    <input style="margin: 10px;" value="{{$bear->email}}" type="text" name="email" placeholder="email "><br>

    <div class="form-group">
        <button class="btn btn-block btn-primary" type="submit">Update bear</button>
    </div>
</form>
@if(session('user')->is_admin ==1)
<form action="/bear/{{$bear->id}}/delete" method="post">
@csrf
    <button type="submit">Delete</button>
</form>
@endif
@else
You are not logged in
@endif
@stop