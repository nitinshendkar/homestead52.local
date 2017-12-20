
@extends('layout/base')

@section('header')
    <h1>Message Board</h1>
@endsection

@section('content')
<a href="{{url('/messageboard/create')}}" class="btn btn-success">Create Message</a>
    <hr>
    
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>From User</th>
            <th>To Role Type</th>
            <th>Message</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->role_name }}</td>
                <td>{{ $message->mesaage }}</td>
                
            </tr>
        @endforeach

        </tbody>

    </table>

   
@endsection