<html>
<head>

<style type="text/css">
    body {
        background: #EEE;
        font-family: sans-serif;
        font-size: 20px;
        margin: 3em;
        padding: 0;
    }

    #register {
        width: 100%;
        margin: auto;
    }

    #ticket {
        background: white;
        margin: -57px -2em;

        box-shadow: 0 0 5px rgba(0, 0, 0, .25);
    }

    #ticket h1 {
        text-align: center;
        font-size: 100px;
        margin: -35px;

    }
    #ticket h2 {
        text-align: center;
        font-size: 100px;
        margin: 20px;

    }
    #ticket h3 {
        text-align: center;
        font-size: 44px;
        margin:12px;

    }
    #ticket h4 {
        text-align: center;
        font-size: 30px;
        margin:12px;

    }

    #ticket ul,
    #ticket div {
        font-family: monospace;
        width: 100%;
        text-align: center;
    }

    #ticket ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #ticket div {
        margin-top: 1em;
    }

    #total {
        font-weight: bold;
    }



</style>

</head>
<body onLoad="imprimir();">
<div id="register">
    <div id="ticket">
@php
/*
    $originalDate = "2010-03-21";
    $newDate = date("d-m-Y", strtotime($originalDate));
    */


    $hora=$pa->horaLlegada;
    $horallegada=date("H:i",strtotime($hora));
    $fecha=$pa->fechaLlegada;
    $fechaLlegada=date("d/m/y",strtotime($fecha));



    echo "<h2>Estacionamiento</h2>";
    echo "<h1>".'"COUSIÑO"'."</h1>";
    echo "<ul>";

    echo "<h3>*********************************************************</h3>";
    echo "<li><h3>N°".$pa->codigo."</h3></li>";
    echo "<li><h3>Patente ".$pa->patente."</h3></li>";
    echo "<li><h3>Ingreso ".$horallegada." Hrs.</h3></li>";
    echo "<li><h3>Fecha ".$fechaLlegada.".</h3></li>";
    echo "<h3>*********************************************************</h3>";
    echo"<li><h4>HORARIO DE ATENCION</h4></li>";
    echo"<li><h4>LUNES A VIERNES 08:00 A 20:00</h4></li>";
    echo"<li><h4>SABADO 08:00 A 16:00</h4></li>";
    echo"<li><h4>DOMINGO CERRADO</h4></li>";

    echo "</ul>";






@endphp

        /*para imprimir apenas se abra*/

        <script type="text/javascript">
            try {
                this.print();

            }
        </script>
        <script>
            try {
                this.close();

            }
        </script>

      </div>

</div>
</body>

</html>