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
    <h1>YOUR MODULE IS NOT APPROVED YET FROM SUPERIOR. <h1>
@stop