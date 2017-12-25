
@extends('layout.base')
@section('content')
    <h1>Create Address Details</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'address.store', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('State', 'State:') !!}
        {!! Form::select('state_id',$arrayReKeystates, 'S',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('District', 'District:') !!}
        {!! Form::select('district_id', $arrayReKeydistricts, 'S',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Taluka', 'Taluka:') !!}
        {!! Form::select('taluka_id', $arrayReKeytalukas, 'S',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Address Type', 'Address Type:') !!}
        {!! Form::select('address_type', ['P' => 'Permenant', 'T' => 'Temporary'], 'S',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Village Name', 'Village Name:') !!}
        {!! Form::text('village',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop