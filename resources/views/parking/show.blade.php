@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Informacion Cliente


                    <div class="panel-body">


                        <table class="table table-striped table-hover">

                            <tbody>

                            <tr>
                                <td>Identificador</td>
                                <td>{{$cliente->id}}</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>{{$cliente->nombre}}</td>
                            </tr>
                            <tr>
                                <td>Documentos</td>
                                <td>{{$cliente->documento}}</td>
                            </tr>
                            <tr>
                                <td>fecha</td>
                                <td>{{$cliente->fecha}}</td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td>{{$cliente->telefono}}</td>
                            </tr>

                            <tr>
                                <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary pull-right">Editar</a></td>
                                <td><a href="{{url()->previous()}}" class="btn btn-primary pull-left">Volver</a></td>
                            </tr>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection