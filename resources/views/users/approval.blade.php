
@extends('layout/base')
@section('header')
    Create User
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
    <div class="container">
    <div class="row">
        <div class="centered col-md-4 col-md-offset-4 text-center top_50">
            <div id="logo-container"></div>
            <div class="col-sm-12 col-md-10 ">
                {!! Form::open(['route' => 'users.storeapproval']) !!}
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        {!! Form::label('Users', 'Users:',['class'=>'input-group-addon']) !!}
                        {!! Form::select('users', $arraySelectionUserList, NULL,['class'=>'form-control']) !!}

                    </div>
                    <div class="form-group input-group">
                        {!! Form::label('Modules', 'Modules:',['class'=>'input-group-addon']) !!}
                        {!! Form::select('modules', $modules, NULL,['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-default "  type="submit">Approve</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop