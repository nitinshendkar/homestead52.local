
@extends('layout.base')
@section('content')
    <h1>Personal Details</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'personal.store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('Date Of Birth', 'Date Of Birth:') !!}
        {!! Form::date('dob',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Date Of Joining', 'Date Of Joining:') !!}
        {!! Form::date('doj',null ,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo', 'photo:') !!}
        {!! Form::file('photo') !!}
    </div>
    <div class="form-group">
        {!! Form::label('Signature', 'Signature:') !!}
        {!! Form::file('signature') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop