<!-- resources/views/auth/register.blade.php -->
@extends('layout.template')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="centered col-md-4 col-md-offset-4 text-center top_50">
            <div id="logo-container"></div>
            <div class="col-sm-12 col-md-10 ">
                <form method="POST" action="/auth/register" enctype="multipart/form-data" >
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
                        <span class="input-group-addon">Home Address </span>
                        <input class="form-control" type="textarea" name="home_address" value="{{ old('home_address') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Office Address</span>
                        <input class="form-control" type="textarea" name="office_address" value="{{ old('office_address') }}">
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
                        <span class="input-group-addon">Employee Id</span>
                        <input class="form-control" type="number" name="emp_id" value="{{ old('emp_id') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Date Of Birth</span>
                        <input class="form-control" type="date" name="dob" value="{{ old('dob') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Date Of Joining</span>
                        <input class="form-control" type="date" name="doj" value="{{ old('doj') }}">
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
                        <button class="btn btn-default "  type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>