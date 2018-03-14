
@extends('layout.base')


@section('content')
<h1>Personals Details</h1>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<a href="{{url('/personal/create')}}" class="btn btn-success">Create Personal Details</a>
<hr>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-info">
            <th>Id</th>
			<th>User Name</th>
            <th>Date Of Birth</th>
            <th>Date Of Joining</th>
            <th>Signature</th>
            <th>Photo</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personals as $personal)
        <tr>
            <td>{{ $personal->id }}</td>
			<td>{{ $personal->name }}&nbsp;{{$personal->lastname}}</td>
            <td>{{ $personal->dob}}</td>
            <td>{{ $personal->doj }}</td>
            <td><?php echo '<img width=100 height=100 src="data:' . $personal->photo_type . ';base64,' . $personal->photo . '"/>'; ?></td>
            <td><?php echo '<img width=100 height=100 src="data:' . $personal->signature_type . ';base64,' . $personal->signature . '"/>'; ?></td>
            @if( $personal->user_id == $loggedInUser )
            <td><a href="{{route('personal.edit',$personal->id)}}" class="btn btn-warning">Update</a></td>

            <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['personal.destroy', $personal->id]]) !!}
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
{{ $personals->appends(['sort' => 'updated_at'])->render() }}
@endsection