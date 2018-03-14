
@extends('layout/base')
@section('header')
    Create Message
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
                <form method="POST" action="/messageboard" >
                    {!! csrf_field() !!}

                    <div class="form-group input-group">
                        {!! Form::label('Role Type', 'Role Type:',['class'=>'input-group-addon']) !!}
                        {!! Form::select('role_type', $arrayReKeyRoles, NULL,['class'=>'form-control']) !!}

                    </div>
                    
                    <div class="form-group input-group " style=" height: 150px;">
                        <span class="input-group-addon"> Message</span>
                        <input class="form-control text-area" type="textarea" name="message" style=" height: 150px; width:500px;" value="{{ old('last_name') }}">
                    </div>
                   
                    
                    <div class="form-group">
                        <button class="btn btn-default "  type="submit">Save Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
