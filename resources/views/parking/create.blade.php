@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Creacion de Cliente
                </div>

                <div class="panel-body">
                    {!! Form::open(['route'=>'parking.store']) !!}

                    <div class="form-group">
                        {!! Form::label('patente','Patente') !!}
                        {!! Form::text('patente',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}

                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection