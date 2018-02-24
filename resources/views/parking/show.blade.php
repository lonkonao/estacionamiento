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
                                    <td>Fecha</td>
                                    <td>{{$parking->fechaLlegada}}</td>
                                </tr>

                                <tr>
                                    <td>Operador</td>
                                    <td>{{$parking->operador}}</td>
                                </tr>

                                <tr>
                                    <td>Patente</td>
                                    <td>{{$parking->patente}}</td>
                                </tr>

                                <tr>
                                    <td>Hora Llegada</td>
                                    <td>{{$parking->horaLlegada}}</td>
                                </tr>

                                <tr>
                                    <td>Codigo</td>
                                    <td>{{$parking->codigo}}</td>
                                </tr>

                                <tr>
                                    <td>Estado</td>
                                    <td>{{$parking->estado}}</td>
                                </tr>
                                <tr>
                        @php
                            $horaLlegada=$parking->horaLlegada;
                            $horaActual= date('H:i');
                            $datetime1 = date_create($horaLlegada);
                            $datetime2 = date_create($horaActual);
                            $interval = date_diff($datetime1, $datetime2);
                            echo "<td>Tiempo Total</td> <td> ".$interval->format('%H horas %I Minutos')."</td>";
                            $total;

                            $horas=$interval->format('%h');
                            $minutos=$interval->format('%I');
                            $totalMinutos= ($horas*60)+$minutos;

                            if ($totalMinutos>30){
                                $totalMenosBase = $totalMinutos - 30;
                                $restode10=floor($totalMenosBase/10);
                                $paga = 400 + ($restode10*200);
                                echo "<h2> Total a Pagar $".$paga."</h2>" ;
                            }else{
                                echo "<h2> Total a Pagar $400</h2>" ;;
                            }

                            $cobro1 = floor($totalMinutos/30);

                        @endphp
                    </div>
                                </tr>

                                <tr>
                                    <td><a href="{{route('parking.edit',$parking->id)}}" class="btn btn-success pull-right">Pagar</a></td>
                                    <td><a href="#" class="btn btn-primary">Imprimir</a></td>
                                    <td><a href="{{url()->previous()}}" class="btn btn-danger pull-left">Volver</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection