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
                <form method="POST" action="/auth/register" >
                    {!! csrf_field() !!}

                    <div class="form-group input-group">
                        <span class="input-group-addon">Name</span>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Email</span>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Password</span>
                        <input class="form-control" type="password" name="password">

                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Confirm Password</span>
                        <input class="form-control" type="password" name="password_confirmation">

                    </div>
                    <div class="form-group">
                        <button class="btn btn-default "  type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>