@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit admin_user
    </h1>
    <form method = 'get' action = '{!!url("admin_user")!!}'>
        <button class = 'btn btn-danger'>admin_user Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("admin_user")!!}/{!!$admin_user->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$admin_user->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="mail">mail</label>
            <input id="mail" name = "mail" type="text" class="form-control" value="{!!$admin_user->
            mail!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection