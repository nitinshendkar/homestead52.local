@extends('layout.base')
@section('content')
    <h1>Update Education Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($author,['method' => 'PATCH','route'=>['education.update',$author->id]]) !!}
    <div class="form-group">
        {!! Form::label('Author Name', 'Author Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
   <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop