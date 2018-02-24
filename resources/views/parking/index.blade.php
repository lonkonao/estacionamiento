@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(Session::has('info'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{Session::get('info')}}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Nuevo Ingreso
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
                    <div class="panel-heading">Listado de Autos Estacionados el dia de hoy @php echo $hoy=date('d-m-y');

                        @endphp


                                    <div class="panel-body">
                                      <div class="panel-body">
                                            <table class="table table-bordered" id="listahoy">
                                                <thead>
                                                       <tr>
                                                           <th>Fecha</th>
                                                           <th>Operador</th>
                                                           <th>Patente</th>
                                                           <th>Hora</th>
                                                           <th>Codigo</th>
                                                           <th>Estado</th>
                                                           <th>Acciones</th>

                                                       </tr>
                                                </thead>
                   <tbody>

                   </tbody>
               </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="modal fade" id="listadoHoyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <div class="insertHere"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Reimprimir Ticket</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection