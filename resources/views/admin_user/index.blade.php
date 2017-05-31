@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Admin_user Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("admin_user")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New admin_user</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>name</th>
            <th>mail</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($admin_users as $admin_user) 
            <tr>
                <td>{!!$admin_user->name!!}</td>
                <td>{!!$admin_user->mail!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/admin_user/{!!$admin_user->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/admin_user/{!!$admin_user->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/admin_user/{!!$admin_user->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $admin_users->render() !!}

</section>
@endsection