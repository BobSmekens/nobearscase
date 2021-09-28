@extends('navbar')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">

                <h4>Login</h4>
                <hr>
                <form action="/loginUser" method="post">
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                </form>
                <br>
                <a href="/registerUser">New user? Register here.</a>
            </div>
        </div>
    </div>
@stop