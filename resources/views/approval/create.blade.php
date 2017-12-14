
@extends('layout.base')
@section('content')
    <h1>Create Proffessional Details</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'proffessional.store', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('Designation', 'Designation:') !!}
        {!! Form::text('designation',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Organization', 'Organization:') !!}
        {!! Form::text('organization',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Current Working', 'Current Working:') !!}
        {!! Form::text('current_working',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Joining Date', 'Joining Date:') !!}
        {!! Form::date('joining_date',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Reveliving Date', 'Reveliving Date:') !!}
        {!! Form::date('reveliving_date',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop