@extends('navbar')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Dashboard</h4>
            @if(Session::has('token'))
            <div>Welcome!</div>
            @endif

            @if(session('user')->is_admin ==1)
                Welcome commander
            @endif

            <hr>
            <table class="table">
                <h3>your information</h3>
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

                </tbody>
            </table>

        </div>
    </div>
</div>
@stop