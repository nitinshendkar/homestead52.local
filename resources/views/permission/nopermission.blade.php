@extends('layout.base')
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
    <h1>YOU DON'T HAVE PERMISSION FOR THIS MODULE. <h1>
@stop