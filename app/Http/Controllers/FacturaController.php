<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Ticket;
use App\Models\Mesa;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function pagar(Factura $factura, Request $request)
    {
        // dd($request->all());
        $factura->dni = $request->input('dni');
        if (strlen($factura->nombres)>1) {
            $factura->nombres = $request->input('nombres');
        }
        if (strlen($factura->celular)>1) {
            $factura->celular = $request->input('celular');
        }




        $tickets = Ticket::where("factura_id", $factura->id)->get();
        foreach ($tickets as $ticket) {
            $ticket->estado = "Pagado";
            $ticket->save();
        }

        $mesa_ocupada = Ticket::where("factura_id", $factura->id)->first();
        $mesa = Mesa::find($mesa_ocupada->mesa_id);
        $mesa->estado = "Disponible";
        $mesa->save();
        // dd($mesa);
        $factura->save();
        // dd($factura);
        return redirect('/facturas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        // dd($factura);
        $tickets = Ticket::where('factura_id', $factura->id)->get();
        return view('facturas.show', compact('factura', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
