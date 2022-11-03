<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $oficinas = Oficina::all();
        // return view('helpdesk.home', compact('oficinas'));
    }

    public function ticketsPendientes()
    {
        $tickets = Ticket::all()->where('estado', 'En espera');
        // dd($tickets);
        return view('tickets.pendientes', compact('tickets'));
        // return view('tickets.pendientes');
    }
    public function ticketsSolucionado()
    {
//        dd('solucionado');
        $tickets = Ticket::all()->where('estado', 'Listo');
        return view('tickets.solucionados', compact('tickets'));
    }
    public function ticketsCancelado()
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
        //
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
        //        dd($ticket);
        return view('tickets.edit', compact('ticket'));
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
        $ticket = Ticket::find($id);
        $ticket->persona->dni = $request->input('dni');
        $ticket->incidencia = $request->input('incidencia');
        $ticket->oficina->nombre_oficina = $request->input('oficina');
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
