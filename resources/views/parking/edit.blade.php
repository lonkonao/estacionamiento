@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Cliente


                        <div class="panel-body">
                            {!! Form::open(['route' => ['parking.update', $parking->id], 'method' => 'PUT']) !!}


                            <div class="form-group">
                                {!! Form::label('nombre','Nombre') !!}
                                {!! Form::text('nombre',$cliente->nombre,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('documento','Documento') !!}
                                {!! Form::number('documento',$cliente->documento,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('fecha','Fecha Nacimiento') !!}
                                {!! Form::date('fecha',$cliente->fecha,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('telefono','Telefono') !!}
                                {!! Form::text('telefono',$cliente->telefono,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Actualizar',['class'=> 'btn btn-primary']) !!}
                            </div>
                            <td><a href="{{url()->previous()}}" class="btn btn-primary pull-left">Volver</a></td>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection