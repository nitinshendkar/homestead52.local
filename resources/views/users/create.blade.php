
@extends('layout/base')
@section('header')
Create User
@endsection

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="centered col-md-4 col-md-offset-4 text-center top_50">
            <div id="logo-container"></div>
            <div class="col-sm-12 col-md-10 ">
                <form method="POST" action="/users" enctype="multipart/form-data" >
                    {!! csrf_field() !!}

                    <div class="form-group input-group">
                        <span class="input-group-addon"> first Name</span>
                        <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"> Last Name</span>
                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Mobile Number</span>
                        <input class="form-control" type="text" name="phone" maxlength="10" value="{{ old('phone') }}">

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">password</span>
                        <input class="form-control" type="password" name="password"  value="{{ old('password') }}">

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Email</span>
                        <input class="form-control" type="email" name="email"  value="{{ old('email') }}">

                    </div>

                    <div class="form-group input-group">
                        {!! Form::label('Role Type', 'Role Type:',['class'=>'input-group-addon']) !!}
                        {!! Form::select('role_type', session('usercreateaccess'), NULL,['class'=>'form-control']) !!}

                    </div>
                    @if( $user->role_type == 'user')
                    <div class="form-group input-group">
                        <span class="input-group-addon">Employee Id</span>
                        <input class="form-control" type="number" name="emp_id" value="{{ $user->emp_id }}">
                    </div>
                    @endif

                    <div class="form-group">
                        <button class="btn btn-default "  type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop