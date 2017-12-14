
@extends('layout.base')


@section('content')
    <h1>Proffessional Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{url('/proffessional/create')}}" class="btn btn-success">Create Proffessional Details</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Designation</th>
            <th>Organization</th>
            <th>Current Working</th>
            <th>Joining Date</th>
            <th>Reveliving Date</th>
            <th>update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($proffessionals as $proffessional)
            <tr>
                <td>{{ $proffessional->id }}</td>
                 <td>{{ $proffessional->designation }}</td>
                  <td>{{ $proffessional->organization }}</td>
                   <td>{{ $proffessional->current_working }}</td>
                    <td>{{ $proffessional->joining_date }}</td>
                     <td>{{ $proffessional->reveliving_date }}</td>
                <td><a href="{{route('proffessional.edit',$proffessional->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['proffessional.destroy', $proffessional->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $proffessionals->appends(['sort' => 'updated_at'])->render() }}
@endsection