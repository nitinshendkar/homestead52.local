@extends('layout/base')

@section('header')
    <h1>Update User</h1>
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
    
    
        {!! Form::model($user,['method' => 'PATCH','route'=>['users.update',$user->id],'files' => true ]) !!}
     <div class="container">
    <div class="row">
        <div class="centered col-md-4 col-md-offset-4 text-center top_50">
            <div id="logo-container"></div>
            <div class="col-sm-12 col-md-10 ">
                <form method="POST" action="/users" enctype="multipart/form-data" >
                    {!! csrf_field() !!}

                    <div class="form-group input-group">
                        <span class="input-group-addon"> first Name</span>
                        <input class="form-control" type="text" name="first_name" value="{{ $user-> name }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"> Last Name</span>
                        <input class="form-control" type="text" name="last_name" value="{{ $user->lastname }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Home Address </span>
                        <input class="form-control" type="textarea" name="home_address" value="{{ $user->home_address }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Office Address</span>
                        <input class="form-control" type="textarea" name="office_address" value="{{ $user->office_address }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Mobile Number</span>
                        <input class="form-control" type="text" name="phone" maxlength="10" value="{{ $user->phone }}">

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Role</span>
                        <select class="form-control"  name="role" >
                            <option value="1">Admin</option>
                            <option value="2">District</option>
                            <option value="3">Taluka</option>
                            <option value="">User</option>

                        </select>

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Email</span>
                        <input class="form-control" type="email" name="email"  value="{{ $user->email }}">

                    </div>
                 
                    <div class="form-group input-group">
                        <span class="input-group-addon">Employee Id</span>
                        <input class="form-control" type="number" name="emp_id" value="{{ $user->emp_id }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Date Of Birth</span>
                        <input class="form-control" type="date" name="dob" value="{{ $user->dob }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Date Of Joining</span>
                        <input class="form-control" type="date" name="doj" value="{{ $user->doj }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Photo</span>
                        <input class="form-control" type="file" name="profile_photo" >
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Signature</span>
                        <input class="form-control" type="file" name="profile_signature">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default "  type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop