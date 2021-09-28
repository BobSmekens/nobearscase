@extends('navbar')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Registration</h4>
                <a href="/loginUser">Already registered? Login here.</a>

                <hr>
                <form action="/registerUser" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                    @endif
                    
                    @csrf
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" placeholder="Enter fullname" name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>

                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter fullname" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        

                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                </form>

                <br>

            </div>
        </div>
    </div>
@stop