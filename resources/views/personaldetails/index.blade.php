
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

    <a href="{{url('/personal/create')}}" class="btn btn-success">Create Author</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Author Name</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($personals as $personal)
            <tr>
                <td>{{ $personal->id }}</td>
                <td><a href="{{route('proffessional.edit',$proffessional->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['proffessional.destroy', $author->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $personals->appends(['sort' => 'updated_at'])->render() }}
@endsection