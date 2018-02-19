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
               <table class="table table-striped table-hover">
                   <thead>
                   <tr>
                       <th>Fecha</th>
                       <th>Operador</th>
                       <th>Patente</th>
                       <th>Hora</th>
                       <th>Codigo</th>
                       <th>Estado</th>
                   <th colspan="3"></th>

                   </tr>
                   </thead>
                   <tbody>
                   @foreach($parking as $paking)
                   <tr>
                       @if($paking->fechaLlegada == $actual=date('Y-m-d'))
                       <td>{{$paking->fechaLlegada}}</td>
                       <td>{{$paking->operador}}</td>
                       <td>{{$paking->patente}}</td>

                       <td>{{$paking->horaLlegada}}</td>
                       <td>{{$paking->codigo}}</td>
                       <td>{{$paking->estado}}</td>

                       <td><a href="{{route('parking.edit',$paking->id)}}" data-hover="tooltip" data-placement="top" data-target="#modal-edit-customers{{ $paking->id }}" data-toggle="modal" id="modal-edit" title="Edit">PAGAR</a></td>
                      <!-- <td><a href="{{route('parking.edit',$paking->id)}}" class="btn btn-primary">Editar</a></td>-->
                           @endif
                       <div class="modal" id="modal-edit-customers{{$paking->id }}">
                           <div class="row">
                               <div class="col-md-8 col-md-offset-2">
                                   <div class="panel panel-default">
                                       <div class="panel-heading">
                                           Pago
                                       </div>

                                       <div class="panel-body">

                                    <h1>Patente {{$paking->patente}}</h1>


@php

$horaLlegada=$paking->horaLlegada;
$horaActual= date('H:i');

    $datetime1 = date_create($horaLlegada);
    $datetime2 = date_create($horaActual);
    $interval = date_diff($datetime1, $datetime2);
    echo "<h2>Tiempo Total  ".$interval->format('%H horas %I Minutos')."</h2>";

    $total;

$horas=$interval->format('%h');
$minutos=$interval->format('%I');

$totalMinutos= ($horas*60)+$minutos;


if ($totalMinutos>30){

$totalMenosBase = $totalMinutos - 30;

$restode10=floor($totalMenosBase/10);

$paga = 400 + ($restode10*200);

echo "<h2> Total a Pagar $".$paga ;
}else{
echo "Paga el Minimo";
}


$cobro1 = floor($totalMinutos/30);









@endphp


                                       </div>

                                   </div>


                               </div>
                           </div>
                       </div>



                   </tr>
                   @endforeach
                   </tbody>
               </table>
                    {!! $parking->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection