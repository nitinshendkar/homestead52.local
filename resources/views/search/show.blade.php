@extends('layout.base')
@section('content')
    <h1>Finder</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model('',['method' => 'POST','route'=>['search.find']]) !!}
    <div class="form-group">
        {!! Form::label('User Name', 'User First Name/Last Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
   <div class="form-group">
        {!! Form::submit('Find', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>User Name</th>
            <th>Mobile Number</th>
           
        </tr>
        </thead>
        <tbody>
        @if(!empty($userlist))
            @foreach ($userlist as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
            </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop