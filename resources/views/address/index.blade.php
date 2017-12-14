
@extends('layout.base')


@section('content')
    <h1>User Address Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{url('/address/create')}}" class="btn btn-success">Add User Details</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>State</th>
            <th>District</th>
            <th>Taluka</th>
            <th>Address Type</th>
            <th>Village</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($address as $addressobj)
            <tr>
                <td>{{ $addressobj->id }}</td>
                <td>{{ $addressobj->state_id }}</td>
                <td>{{ $addressobj->district_id }}</td>
                <td>{{ $addressobj->taluka_id }}</td>
                <td>{{ $addressobj->address_type }}</td>
                <td>{{ $addressobj->village }}</td>
                <td><a href="{{route('address.edit',$addressobj->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['address.destroy', $addressobj->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $address->appends(['sort' => 'updated_at'])->render() }}
@endsection