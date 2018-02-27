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
    img{
        width: 800px;
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
        text-align: center;
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
    echo "<li >".DNS1D::getBarcodeHTML($pa->codigo, "C128",6,100)."</li>";
    echo "<li><h3>Patente ".$pa->patente."</h3></li>";
    echo "<li><h3>Ingreso ".$horallegada." Hrs.</h3></li>";
    echo "<li><h3>Fecha ".$fechaLlegada.".</h3></li>";
    echo "<h3>*********************************************************</h3>";
    echo"<li><h4>HORARIO DE ATENCION</h4></li>";
    echo"<li><h4>LUNES A VIERNES 08:00 A 20:00</h4></li>";
    echo"<li><h4>SABADO 08:00 A 16:00</h4></li>";
    echo"<li><h4>DOMINGO CERRADO</h4></li>";






@endphp

        <!--     <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('173820429', 'C39+')}}" alt="barcode" /><br/><br/>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('173820429', 'C39E')}}" alt="barcode" /><br/><br/>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('173820429', 'C39E+')}}" alt="barcode" /><br/><br/>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('173820429', 'C93')}}" alt="barcode" /><br/><br/>
            <br/>
            <br/>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
            <br/>
            <br/>
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />
        </div>
-->

        <!--para imprimir apenas se abra*/-->

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