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
    {!! Form::model($bank,['method' => 'PATCH','route'=>['banks.update',$bank->id]]) !!}
    <div class="form-group">
        <span class="input-group-addon"> Bank Name</span>
        <input class="form-control" type="text" name="bank_name" value="{{ $bank->bank_name }}">
    </div>
    <div class="form-group">
        <span class="input-group-addon"> Bank Name</span>
        <input class="form-control" type="text" name="branch_name" value="{{ $bank->branch_name }}">
    </div>
    <div class="form-group">
        <span class="input-group-addon"> IFSC Code</span>
        <input class="form-control" type="text" name="ifsc_code" value="{{ $bank->ifsc_code }}">
    </div>
    <div class="form-group">
        <span class="input-group-addon">Account Number</span>
        <input class="form-control" type="text" name="account_no" value="{{ $bank->account_no }}">
    </div>
   <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop