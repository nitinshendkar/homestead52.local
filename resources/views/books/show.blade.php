@extends('layout/base')

@section('header')
    <h1>{{ $book->title }}</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr><td>Title</td><td>{{ $book->title }}</td> </tr>
        <tr><td>Author</td><td>{{ $book->author->name }}</td> </tr>
        <tr><td>Description</td><td>{{ $book->description }}</td> </tr>
        </tbody>
    </table>
@endsection