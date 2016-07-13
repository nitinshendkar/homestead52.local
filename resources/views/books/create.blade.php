
@extends('layout/base')
@section('content')
    <h1>Create Book</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="centered col-md-4 col-md-offset-4 top_50">
        {!! Form::open(['route' => 'books.store']) !!}
        <div>
            {!! Form::label('Title', 'Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Author Id', 'Author:') !!}
            {!! Form::text('author_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Description', 'Description:') !!}
            {!! Form::text('description',null,['class'=>'form-control']) !!}
        </div>
       <div class="form-group text-center">
            {!! Form::submit('Save', ['class' => 'btn btn-primary  span2 form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop