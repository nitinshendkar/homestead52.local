@extends('layout/base')

@section('header')
    <h1>{{ $user->title }}</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr><td>First Name</td><td>{{ $user->title }}</td> </tr>
        <tr><td>Last Name</td><td>{{ $user->author->name }}</td> </tr>
        <tr><td>Home Address</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Office Address</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Phone</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Employee Id</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Date Of Birth</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Date Of Joining</td><td>{{ $user->description }}</td> </tr>
        <tr><td>photo</td><td>{{ $user->description }}</td> </tr>
        <tr><td>signature</td><td>{{ $user->description }}</td> </tr>
        <tr><td>Email</td><td>{{ $user->description }}</td> </tr>
        </tbody>
    </table>
@endsection