
@extends('layout.base')
@section('content')
    <h1>Add Bank</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'banks.store']) !!}
    <div class="form-group">
        {!! Form::label('Banks Name', 'Banks Name:') !!}
        {!! Form::text('bank_name',null,['class'=>'form-control']) !!}
        {!! Form::label('Branch Name', 'Branch Name:') !!}
        {!! Form::text('branch_name',null,['class'=>'form-control']) !!}
        {!! Form::label('IFSC Name', 'IFSC Code:') !!}
        {!! Form::text('ifsc_code',null,['class'=>'form-control']) !!}
        {!! Form::label('Account Number', 'Account Number:') !!}
        {!! Form::text('account_no',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop