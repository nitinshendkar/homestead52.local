@extends('layout.template')
@section('toolbar')
    <!-- view/layouts/base.blade.php -->
    @if(Auth::guest())
        <li class="pull-right">
            <a href="{{ route('login') }}">login</a>
             <a href="{{ route('register') }}">register</a>
        </li>
    @else
        <nav class="glyphicon navbar navbar-header navbar-default navbar-fixed-top onTop">
            <div class="container">
                <div class="navbar-header">

                    <div class="navbar-brand glyphicon glyphicon-user pull-left" href="#">
                        <span>{{ Auth::user()->name }}</span></div>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="/home">Home</a></li>
                        <li><a href="/users">Users <br>Profile</a></li>
						<li><a href="/educations">&nbsp; <br>Education</a></li>
						<li><a href="/personal">&nbsp; <br>Personal</a></li>
						<li><a href="/banks">&nbsp; <br>Bank</a></li>
						<li><a href="/proffessional">&nbsp; <br>professional</a></li><li><a href="{{ route('address.index')}}">&nbsp;<br>Address</a></li><li><a href="{{ route('address.index')}}">User <br>Approval</a></li>
						<li><a href="{{ route('search.show')}}">Finder</a></li>
                        <li><a href="/paywithpaypal">Make <br>Payment</a></li>
                    </ul>
                    <div class="navbar-brand glyphicon glyphicon-off pull-right" href="#">
                        <span class="caption"><a href="{{ route('logout') }}">Logout</a></span>
                    </div>

                </div><!--/.nav-collapse -->
            </div>
        </nav>

        {{--<li><a href="{{ route('profile', Auth::user()->getKey() ) }}">Profile</a></li>--}}

    @endif
@stop

