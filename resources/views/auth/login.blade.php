<!-- resources/views/auth/login.blade.php -->

@extends('layout.template')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="centered col-md-4 col-md-offset-4 top_50">
            <div id="logo-container"></div>
            <div class="col-sm-12 col-md-10 ">
                <form method="POST" action="/auth/login"  id="loginForm">
                    {!! csrf_field() !!}

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" type="email" name='email' placeholder="email" value="{{ old('email') }}"/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" id="password" type="password" name='password' placeholder="password"/>

                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-def">Login</button>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        Dont have an account? <a class="btn btn-default navbar-btn" href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
