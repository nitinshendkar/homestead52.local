
@extends('layout.base')
@section('content')
<h1>Create Address Details</h1>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(['route' => 'address.store', 'files' => true]) !!}
<div class="form-group">
    {!! Form::label('State', 'State:') !!}
    {!! Form::select('state_id',$arrayReKeystates, 'S',['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('District', 'District:') !!}
    {!! Form::select('district_id', $arrayReKeydistricts, 'S',['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Taluka', 'Taluka:') !!}
    <select name="taluka_id" class="form-control">
        <option>--Taluka--</option>

    </select>
<!--    {!! Form::select('taluka_id', $arrayReKeytalukas, 'S',['class'=>'form-control']) !!}-->
</div>
<div class="form-group">
    {!! Form::label('Address Type', 'Address Type:') !!}
    {!! Form::select('address_type', ['P' => 'Permenant', 'T' => 'Temporary'], 'S',['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Village Name', 'Village Name:') !!}
    {!! Form::text('village',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@stop
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('select[name="district_id"]').on('change', function () {
            var districtid = $(this).val();
            
            if (districtid) {
                $.ajax({
                    url: '/taluka/get/' + districtid,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function () {
                        $('#loader').css("visibility", "visible");
                    },

                    success: function (data) {

                        $('select[name="taluka_id"]').empty();

                        $.each(data, function (key, value) {

                            $('select[name="taluka_id"]').append('<option value="' + key + '">' + value + '</option>');

                        });
                    },
                    complete: function () {
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="taluka_id"]').empty();
            }

        });

    });
</script>