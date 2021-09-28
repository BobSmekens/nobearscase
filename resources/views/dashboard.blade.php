@extends('navbar')


@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Dashboard</h4>

                <hr>
                <table class="table">

                    <thead>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="/logoutUser/{{$user->Id}}">Logout</a></td>
                        </tr>
                        @if(Session::has('token'))
                        <div class="alert alert-danger">{{Session::get('token')}}</div>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop