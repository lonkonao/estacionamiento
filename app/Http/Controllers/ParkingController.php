<?php

namespace App\Http\Controllers;

use App\Parking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Datatables;
use Barryvdh\DomPDF\Facade as pdf;


class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parking = Parking::all();


        return view('parking.index', compact('parking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parking = new Parking();

        $now = Carbon::now();
        $user_id = Auth::User()->name;

        $cod1 = $now->format('dm');
        $cod2 = $now->format('Hiss');
        $codigo = $cod1 . $cod2;
        $patente = strtoupper($request->patente);

        $parking->fechaLlegada = $now->format('Y-m-d');
        $parking->operador = $user_id;
        $parking->patente = $patente;
        $parking->horaLlegada = $now->format('H:i');
        $parking->codigo = $codigo;
        $parking->estado = 'PENDIENTE';
        $parking->horaRetirada = '00:00';
        $parking->total = '0';
        $parking->tiempoTotal = '0';


        $parking->save();


        return redirect()->route('parking.index')->with('info', 'Fue Creado Exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parking $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        return view('parking.show', compact('parking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parking $parking
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {


        return view('parking.edit', compact('parking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Parking $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parking $parking)
    {
        $estado = $request->estado;


        if ($estado == 'PAGADO') {

            $pa = Parking::findOrfail($parking->id);

            $pa->estado = $request->estado;
            $pa->horaRetirada = $request->horaRetirada;
            $pa->total = $request->total;
            $pa->tiempoTotal = $request->totalTiempo;

            //dd($pa);

            $pa->save();


            return redirect()->route('parking.index')->with('info', 'Guardado Con Exito');
        } else {
            return redirect()->route('parking.index')->with('info', 'No cambiaste el estado de pendiente a pagado');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parking $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {
        //
    }

    public function getIndex()
    {
        return view('listadototal');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $now = Carbon::now();
        $fechaLlegada = $now->format('Y-m-d');
        $parking = \App\Parking::all()->where("fechaLlegada", "=", "$fechaLlegada")->where("estado", "=", "PENDIENTE");


        //return Datatables::of($parking)->make(true);
        return Datatables::of($parking)->toJson();


        return $dataTable->make(true);
    }

    public function listado()
    {
        return view('listadototal');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listadoJson()
    {
        $now = Carbon::now();
        $fechaLlegada = $now->format('Y-m-d');
        $parking = \App\Parking::all();


        //return Datatables::of($parking)->make(true);
        return Datatables::of($parking)->toJson();


        return $dataTable->make(true)->parameter(['buttons' => ['postExcel', 'postCsv', 'postPdf'],]);
    }

    public function pdf1($id)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/


        $pa = Parking::findOrfail($id);


        // $products = Product::all();

        // $pdf = PDF::loadView('pdf.products', compact('products'));
        $pdf = PDF::loadView('pdf.ticket', compact('pa'));


        //  return $pdf->view('ticketD.pdf');

        return $pdf->stream("ticketD.pdf", array("Attachment" => false));

        exit(0);


    }

    public function pdfTest($id)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/
        $pa = Parking::findOrfail($id);


        // $products = Product::all();

        // $pdf = PDF::loadView('pdf.products', compact('products'));
        $pdf = PDF::loadView('pdf.ticket', compact('pa'));


        // return $pdf->view('ticketD.pdf');

        return view('pdf.ticket', compact('pa'));


    }

    public function barcode()
    {
        return view('barcode');
    }
}
