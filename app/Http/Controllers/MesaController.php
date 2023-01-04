<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Plato;
use App\Models\Ticket;
use App\Models\Factura;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }
    public function pedido(Mesa $mesa)
    {
        $hoy = Carbon::now('America/Lima')->toDateString();
        $platos = Plato::where('fecha', $hoy)->get();
        return view('mesas.pedidos', compact('mesa', 'platos'));
    }
    public function pedido_store(Mesa $mesa, Request $request)
    {
        // dd($request->all());
        $factura = new Factura;
        $factura->save();
        // dd($factura->id);

        $pedidos = $request->input('pedidos');
        foreach ($pedidos as $key) {
            // $i = array_search(null, array_column($pedidos, 'cantidad'));
            if (!is_null($key['cantidad'])) {
                // unset($pedidos[$i]);
                // dd($request->input('pedidos'));
                // dd($key);
                $ticket = new Ticket;
                $ticket->plato_id = $key['plato'];
                $ticket->mesa_id = $mesa->id;
                $ticket->cantidad = $key['cantidad'];
                $ticket->factura_id = $factura->id;
                $ticket->save();

            }
        }
        $mesa->estado = "Ocupado";
        $mesa->save();


        return redirect('/mesas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mesa = New Mesa;
        $mesa->numero = $request->input('n_mesa');
        $mesa->save();

        return redirect('/mesas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        //
    }
    public function suspender(Mesa $mesa)
    {
        $mesa->estado = "Suspendido";
        $mesa->save();

        return redirect('/mesas');
    }
    public function activar(Mesa $mesa)
    {
        $mesa->estado = "Disponible";
        $mesa->save();

        return redirect('/mesas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        //
    }
}
