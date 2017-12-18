
@extends('layout/base')

@section('header')
    <h1>Users</h1>
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

    <a href="{{url('/users/create')}}" class="btn btn-success">Create User</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>phone</th>
            <th>employee Id</th>
            <th>email</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
         
        @foreach($users as $user)
            <tr>
                
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->emp_id }}</td>
                <td>{{ $user->email }}</td>
                
               @if( $user->id == $loggedInUser )
               <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Update</a></td>
 
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                @else
                <td>&nbsp;</td>
 
                <td>&nbsp;</td>
               @endif
                
            </tr>
        @endforeach

        </tbody>

    </table>

    {{ $users->appends(['sort' => 'updated_at'])->render() }}
@endsection