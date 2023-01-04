<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();
        return view('platos.base_show', compact('platos'));
    }
    public function fecha(Request $request)
    {
        $plato = Plato::find($request->input('id'));
        $plato->fecha = $request->input('fecha');
        $plato->save();
    }
    public function menu()
    {
        $hoy = Carbon::now('America/Lima')->toDateString();
        // dd($hoy);
        $platos_hoy = Plato::where('fecha', $hoy)->get();
        // dd($plato);
        return view('platos.hoy', compact('platos_hoy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=> 'required',
                'costo'=> 'required',
            ]
        );
        // dd($request->all());
        $plato = new Plato;
        $plato->nombre = $request->input('nombre');
        $plato->costo = $request->input('costo');
        $plato->fecha = $request->input('fecha');
        $plato->save();
        return redirect('/platos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        // $plato = Plato::find($plato);
        return view('platos.edit', compact('plato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        $request->validate(
            [
                'nombre'=> 'required',
                'costo'=> 'required',
            ]
        );
        // dd($request->all());
        $plato->nombre = $request->input('nombre');
        $plato->costo = $request->input('costo');
        $plato->fecha = $request->input('fecha');
        $plato->save();
        return redirect('/platos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        //
    }
}
