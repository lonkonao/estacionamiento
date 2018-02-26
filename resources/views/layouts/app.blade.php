<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <script src="/js/laroute.js"></script>


    <script>setTimeout('document.location.reload()',20000); </script>
</head>
<body>
    <div id="app">
                <!-- menu-->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Estacionamiento</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/home">Inicio</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehiculos <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/parking">Entrada</a></li>
                                        <li><a href="/listado">Historial</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

                <!-- menu-->
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script>
        $(function() {
          var listahoy=  $('#listahoy').DataTable({
              language: {
                  "lengthMenu": "Mostrar _MENU_ Autos Por Pagina",
                  "zeroRecords": "No Hay Vehiculos Estacionados Hoy",
                  "info": "Mostrando Pagina _PAGE_ de _PAGES_",
                  "infoEmpty": "0 Vehiculos",
                  "infoFiltered": "(filtered from _MAX_ total records)",
                  "search": "Buscar X Placa o Codigo",
                  paginate: {
                      "next": "Siguiente",
                      "previous":"Anterior"

                  }
              },
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'fechaLlegada', name: 'fechaLlegada' },
                    { data: 'operador', name: 'operador' },
                    { data: 'patente', name: 'patente' },
                    { data: 'horaLlegada', name: 'horaLlegada' },
                    { data: 'codigo', name: 'codigo' },
                    { data: 'estado', name: 'estado' },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            var buttonID = full.id;
                            return '<a href="parking/'+buttonID+'"><span class="glyphicon glyphicon-edit btn btn-default" aria-hidden="true"></span></a>' +
                                   '<a href="ticketEstacionamiento/'+buttonID+'" target="_blank"><span class="glyphicon glyphicon-print btn btn-default" aria-hidden="true"></span></a>';
                        }
                    },

                ],
            });
            $('#listahoy tbody').on( 'click', 'button', function () {
                var data = listahoy.row($(this).parents('tr')).data();
                //  alert( data['operador'] +"'s salary is: "+ data['operador'] );
                var id = data['id'];
                $('.insertHere').html(



                    // Adding and structuring the full data
                    '<table class="table dtr-details" width="100%">' +
                    '<tbody>' +
                    '<tr><td>ID</td><td id="idd">' + data['id'] + '</td></tr>' +
                    '<tr><td>Hora Llegada</td><td>' + data['fechaLlegada'] + '</td></tr>' +
                    '<tr><td>Operador</td><td>' + data['operador'] + '</td></tr>' +
                    '<tr><td>Patente</td><td>' + data['patente'] + '</td></tr>' +
                    '<tr><td>Hora Llegada</td><td>' + data['horaLlegada'] + '</td></tr>' +
                    '<tr><td>Codigo</td><td>' + data['codigo'] + '</td></tr>' +
                    '<tr><td>Estado</td><td>' + data['estado'] + '</td></tr>' +
                    '</tbody>' +
                    '</table> '+
                    '<a href="#?id='+id+'"><span class="glyphicon glyphicon-edit btn btn-default" aria-hidden="true"></span></a>'




                );
                $('#listadoHoyModal').modal('show'); // calling the bootstrap modal

            });

        });
    </script>
    <script>
        $(function() {
            var listadoTabla=$('#listado').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'excelHtml5',

                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ Autos Por Pagina",
                    "zeroRecords": "No Hay Vehiculos Estacionados Hoy",
                    "info": "Mostrando Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "0 Vehiculos",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar X Placa o Codigo",
                    paginate: {
                        "next": "Siguiente",
                        "previous":"Anterior"

                    }
                },

                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('listado.jason') !!}',

                columns: [
                    { data: 'fechaLlegada', name: 'fechaLlegada' },
                    { data: 'operador', name: 'operador' },
                    { data: 'patente', name: 'patente' },
                    { data: 'horaLlegada', name: 'horaLlegada' },
                    { data: 'codigo', name: 'codigo' },
                    { data: 'estado', name: 'estado' },
                    { data: 'horaRetirada', name: 'horaRetirada' },
                    { data: 'total', name: 'total' },
                    { data: 'tiempoTotal', name: 'tiempoTotal' },
                   /* {
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>"

                    },*/




                ],
                });
            $('#listado tbody').on( 'click', 'button', function () {
                var data = listadoTabla.row($(this).parents('tr')).data();
                //  alert( data['operador'] +"'s salary is: "+ data['operador'] );
                $('.insertHere').html(
                    // Adding and structuring the full data


                    '<table class="table dtr-details" width="100%">' +
                    '<tbody>' +
                    '<tr><td>Hora Llegada<td><td>' + data['id'] + '</td></tr>' +
                    '<tr><td>ID<td><td>' + data['id'] + '</td></tr>'+
                    '<tr><td>Operador<td><td>' + data['operador'] + '</td></tr>' +
                    '<tr><td>Patente<td><td>' + data['patente'] + '</td></tr>' +
                    '<tr><td>Hora Llegada<td><td>' + data['horaLlegada'] + '</td></tr>' +
                    '<tr><td>Codigo<td><td>' + data['codigo'] + '</td></tr>' +
                    '<tr><td>Estado<td><td>' + data['estado'] + '</td></tr>' +
                    '</tbody>' +
                    '</table>'
                );
                $('#myModal').modal('show'); // calling the bootstrap modal

            });

            });
    </script>

<script>
    document.getElementById("btnPrint").onclick = function () {
        printElement(document.getElementById("printThis"));
    }

    function printElement(elem) {
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }

</script>

</body>
</html>
