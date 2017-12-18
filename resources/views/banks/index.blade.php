
@extends('layout.base')


@section('content')
    <h1>Bank Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{url('/banks/create')}}" class="btn btn-success">Create Bank Details</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>IFSC Code</th>
            <th>Account Number</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($banks as $bank)
            <tr>
                <td>{{ $bank->id }}</td>
                <td>{{ $bank->bank_name }}</td>
                <td>{{ $bank->branch_name }}</td>
                <td>{{ $bank->ifsc_code }}</td>
                <td>{{ $bank->account_no }}</td>
                
                
                <td><a href="{{route('banks.edit',$bank->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['banks.destroy', $bank->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $banks->appends(['sort' => 'updated_at'])->render() }}
@endsection