@extends('layout.base')
@section('content')
    <h1>Update Book</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($address,['method' => 'PATCH','route'=>['address.update',$address->id]]) !!}
    <div class="form-group">
        {!! Form::label('State', 'State:') !!}
        {!! Form::select('state_id',$arrayReKeystates, $address->state_id,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('District', 'District:') !!}
        {!! Form::select('district_id', $arrayReKeydistricts, $address->district_id,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Taluka', 'Taluka:') !!}
        {!! Form::select('taluka_id', $arrayReKeytalukas, $address->taluka_id,['class'=>'form-control']) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop