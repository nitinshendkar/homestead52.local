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
    {!! Form::model($education,['method' => 'PATCH','route'=>['educations.update',$education->id]]) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop