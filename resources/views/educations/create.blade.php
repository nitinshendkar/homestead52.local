
@extends('layout.base')
@section('content')
    <h1>Create Education Details</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'educations.store']) !!}
    <div class="form-group">
        {!! Form::label('Degree Name', 'Degree Name:') !!}
        {!! Form::text('degree',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Board Name', 'Board Name:') !!}
        {!! Form::text('board',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Percentage', 'Percentage:') !!}
        {!! Form::text('percentage',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Specialization', 'Specialization:') !!}
        {!! Form::text('specialization',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Year Of Passing', 'Year Of Passing:') !!}
        {!! Form::text('year_of_passing',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop