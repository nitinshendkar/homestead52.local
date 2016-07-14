
@extends('layout/base')

@section('header')
    <h1>Book's Store</h1>
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{url('/books/create')}}" class="btn btn-success">Create Book</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td><a href="{{route('authors.show',$book->author->id)}}"> {{$book->author->name }}</a></td>
                <td>{{ $book->description }}</td>
                <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['books.destroy', $book->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection