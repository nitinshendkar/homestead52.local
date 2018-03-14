
@extends('layout/base')

@section('header')
    <h1>Change Password</h1>
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
    @if(!empty(session('success')))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif

    <table class="table table-striped table-bordered table-hover">
        
        <tbody>
            <tr>
                <td>
                    {!! Form::open(['method' => 'POST', 'route'=>['changepassword.store', $user->id]]) !!}
					 <div class="form-group">
       					<span>New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <input type='password' name='change_password' id ='change_password'>
    				</div>
<div class="form-group">
       					Confirm Password &nbsp;&nbsp; <input type='password' name='conform_change_password' id ='change_password'>
    				</div>					
                    {!! Form::submit('Change Password', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>

    </table>

  
@endsection