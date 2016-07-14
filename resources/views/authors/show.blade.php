@extends('layout/base')

@section('header')
    <h1>{{ $author->title }}</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr><td>Id</td><td>{{ $author->id }}</td> </tr>
        <tr><td>Author</td><td>{{ $author->name }}</td> </tr>
        </tbody>
    </table>
@endsection