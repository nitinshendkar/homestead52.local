
@extends('layout.base')


@section('content')
<h1>Educations Details</h1>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<a href="{{url('/educations/create')}}" class="btn btn-success">Create educations Details</a>
<hr>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Degree</th>
            <th>Board</th>
            <th>Percentage</th>
            <th>Specialization</th>
            <th>Year Of Passing</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($educations as $education)
        <tr>
            <td>{{ $education->id }}</td>
            <td>{{ $education->degree }}</td>
            <td>{{ $education->board }}</td>
            <td>{{ $education->percentage}}</td>
            <td>{{ $education->specialization }}</td>
            <td>{{ $education->year_of_passing }}</td>
            @if( $education->user_id == $loggedInUser )
            <td><a href="{{route('educations.edit',$education->id)}}" class="btn btn-warning">Update</a></td>

            <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['educations.destroy', $education->id]]) !!}
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
{{ $educations->appends(['sort' => 'updated_at'])->render() }}
@endsection