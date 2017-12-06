
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

    <a href="{{url('/books/create')}}" class="btn btn-success">Create User</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Home Address</th>
            <th>Office Address</th>
            <th>phone</th>
            <th>employee Id</th>
            <th>Date Of Birth</th>
            <th>Date Of Joining</th>
            <th>Photo</th>
            <th>Signature</th>
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
                <td>{{ $user->home_address }}</td>
                <td>{{ $user->office_address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->emp_id }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ $user->doj }}</td>
        
                <td><?php echo '<img width=100 height=100 src="data:'.$user->photo_type.';base64,' .$user->photo .'"/>'; ?></td>
                <td><?php echo '<img width=100 height=100 src="data:'.$user->signature_type.';base64,'. $user->signature .'"/>'; ?></td>
                <td>{{ $user->email }}</td>
                
                
                <td><a href="{{route('books.edit',$user->id)}}" class="btn btn-warning">Update</a></td>
 
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['books.destroy', $user->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>

    {{ $users->appends(['sort' => 'updated_at'])->render() }}
@endsection