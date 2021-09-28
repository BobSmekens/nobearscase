@extends('navbar')

@section('content')

    @if(Session::has('token'))
    <h4>Upload .csv to database</h4><br>
    @if(Session::has('uploaded'))
    <div class="alert alert-danger">{{Session::get('uploaded')}}</div>
    @endif
    <form action="{{ url('/import')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file"><br>
        <button type="submit">submit</button>
    </form>
    @else
    You are not logged in
    @endif
    <script src="" async defer></script>
@stop