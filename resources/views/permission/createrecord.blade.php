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
    <h1> THIS MODULE REQUIRED APPROVAL SO INFORMATION WILL VISIBLE AFTER VERIFICATION. <h1>
@stop