@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show admin_user
    </h1>
    <br>
    <form method = 'get' action = '{!!url("admin_user")!!}'>
        <button class = 'btn btn-primary'>admin_user Index</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>name : </i></b>
                </td>
                <td>{!!$admin_user->name!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>mail : </i></b>
                </td>
                <td>{!!$admin_user->mail!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection