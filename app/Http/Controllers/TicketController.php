<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Plato;
use App\Models\Mesa;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tickets = Ticket::all();
        return view('tickets.base_show');
    }

    public function ticketsPendientesList()
    {
        $tickets = Ticket::all()->where('estado', 'En espera');
        $platos = Plato::all();
        $mesas = Mesa::all();
        // dd($tickets);
        return view('tickets.pendientes', compact('tickets', 'platos', 'mesas'));
        // return view('tickets.pendientes');
    }
    public function ticketsSolucionadoList()
    {
//        dd('solucionado');
        $tickets = Ticket::all()->where('estado', 'Listo');
        return view('tickets.solucionados', compact('tickets'));
    }
    public function ticketsCanceladoList()
    {
        $tickets = Ticket::all()->where('estado', 'Cancelado');
        return view('tickets.cancelados', compact('tickets'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $ticket = new Ticket;
        $ticket->mesa_id = $request->input('mesa');
        $ticket->plato_id = $request->input('plato');
        $ticket->save();
        return redirect()->route('tickets.pendientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ticket = Ticket::find($id);
        $platos = Plato::all();
        $mesas = Mesa::all();
        //        dd($ticket);
        return view('tickets.edit', compact('ticket', 'platos', 'mesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $ticket = Ticket::find($id);
        $ticket->plato->nombre = $request->input('plato');
        $ticket->mesa->numero = $request->input('mesa');
        $ticket->factura_id = $request->input('factura');
        $ticket->estado = $request->input('estado');
        $ticket->save();

        return redirect()->route('tickets.pendientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
