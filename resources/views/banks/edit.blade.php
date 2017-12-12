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
    {!! Form::model($bank,['method' => 'PATCH','route'=>['banks.update',$bank->id],'files'=>true]) !!}
    {!! Form::label('Banks Name', 'Banks Name:') !!}
        {!! Form::text('bank_name',null,['class'=>'form-control']) !!}
        {!! Form::label('Branch Name', 'Branch Name:') !!}
        {!! Form::text('branch_name',null,['class'=>'form-control']) !!}
        {!! Form::label('IFSC Name', 'IFSC Code:') !!}
        {!! Form::text('ifsc_code',null,['class'=>'form-control']) !!}
        {!! Form::label('Account Number', 'Account Number:') !!}
        {!! Form::text('account_no',null,['class'=>'form-control']) !!}
   <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop