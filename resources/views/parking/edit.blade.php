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
                                {!! Form::label('patente','Patente') !!}
                                {!! Form::text('patente',$parking->patente,['class'=>'form-control','readonly' => 'true']) !!}
                            </div>

                            @php
                           $horaLlegada=$parking->horaLlegada;
                           $horaActual= date('H:i');
                           $datetime1 = date_create($horaLlegada);
                           $datetime2 = date_create($horaActual);
                           $interval = date_diff($datetime1, $datetime2);

                            $horas=$interval->format('%h');
                            $minutos=$interval->format('%I');
                            $totalMinutos= ($horas*60)+$minutos;

                            if ($totalMinutos>30){
                                $totalMenosBase = $totalMinutos - 30;
                                $restode10=floor($totalMenosBase/10);
                                $paga = 400 + ($restode10*200);

                            }else{

                                $paga=400;

                            }

                            $cobro1 = floor($totalMinutos/30);


                            @endphp

                           <div class='form-group'>
                               {!! Form::label('horaRetirada','Hora Retirada') !!}
                               {!! Form::text('horaRetirada',$datetime2->format('H:i'),['class'=>'form-control','readonly' => 'true']) !!}
                           </div>


                            <div class="form-group">
                                {!! Form::label('total','Total a Pagar $') !!}
                                {!! Form::text('total',$paga,['class'=>'form-control','readonly' => 'true']) !!}
                            </div>

                           <div class="form-group">
                               {!! Form::label('total','Total Tiempo') !!}
                               {!! Form::text('total',$interval->format('%H horas %I Minutos'),['class'=>'form-control','readonly' => 'true']) !!}
                           </div>

                           <div class="form-group">
                               {!! Form::label('estado','Estado') !!}
                               {!! Form::select('estado', ['PENDIENTE' => 'PENDIENTE', 'PAGADO' => 'PAGADO']) !!}
                           </div>

                           <div class="form-group">
                               <td>{!! Form::submit('Actualizar ',['class'=> 'btn btn-success pull-left']) !!}&nbsp;

                           <a href="{{url()->previous()}}" class="btn btn-danger pull-left">Volver</a></td>
                           {!! Form::close() !!}
                           </div>
</div>
</div>
</div>
</div>
</div>
@endsection