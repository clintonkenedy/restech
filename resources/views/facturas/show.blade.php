
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>FACTURA N°: <b>{{$factura->id}}</b> </h2>
</center>
@stop

@section('content')

    <h3>TICKETS</h3>
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>ID</th>
            <th>ESTADO</th>
            <th>MESA</th>
            <th>PLATO</th>
            <th>CANTIDAD</th>
            <th>COSTO</th>
            <th>TOTAL</th>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr class="">
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->estado}}</td>
                    <td>{{$ticket->mesa->numero}}</td>
                    <td>{{$ticket->plato->nombre}}</td>
                    <td>{{$ticket->cantidad}}</td>
                    <td>{{$ticket->plato->costo}}</td>
                    <td name="costo">{{($ticket->cantidad)*($ticket->plato->costo)}}</td>
                </tr>
            @endforeach
                <tr class="bg bg-blue">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b class="h5" id="total"></b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-between mb-4">
        <div class="col-md-2">

        </div>
        <div class="col-md-3">
            <div class="float-right">
                {{-- <a href="{{route('facturas.pagar', $factura)}}" class="btn btn-lg btn-success">
                    Pagar
                </a> --}}
                @if ($factura->estado == "Pendiente")
                <a href="{{route('facturas.cancelar', $factura)}}" class="btn btn-danger">Cancelar</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_pago">
                    <span class="fa fa-dollar"></span>
                    Pagar
                    </button>
                @endif

            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="m_pago" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title text-white">Datos de Pago:</h4>
                </div>
                <div class="modal-body">
                <form id="crearEvento" name="crearEvento" class="mt-2"  action="{{route('facturas.pagar', $factura)}}" method="POST">
                    @csrf
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="col-form-label col-form-label-lg">
                                        <b>DNI</b>
                                    <span style="color: red;">*</span>
                                    </label>
                                    <input type="text" name="dni" id="" value="" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="celular" class="col-form-label col-form-label-lg">
                                        <b>Celular</b>
                                    <span style="color: red;">*</span></label>
                                    <input type="text" name="celular" id="" value="" class="form-control">
                                    <div id="errorInicio" class=""></div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="nombres" class="col-form-label col-form-label-lg">
                                        <b>Nombres</b>
                                        <span style="color: red;">*</span></label>
                                    <input type="text" name="nombres" id="" value="" class="form-control">
                                </div>
                        </div>
                </div>
                <div class="modal-footer bg-gradient-navy">
                    <div class="float-right">
                        <button type="button" class="btn btn-danger" style="background-color: #FF0017" data-dismiss="modal"><b>Cancelar</b></button>
                        <button class="btn btn-success" id="btn_pagar" onclick="pagar()"><b>Pagar</b></button>
                        <button class="btn btn-success" type="button" disabled id="btn_pagando" hidden>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Pagando...
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        let total = 0;
        const costos = document.getElementsByName('costo');
        costos.forEach(element => {
            total += parseFloat(element.innerText);
            document.getElementById('total').innerHTML = "S/ "+ total;
        });

        const pagar = () => {
            console.log('hola');
            // document.getElementById('btn_pagar').hidden = true;
            // document.getElementById('btn_pagando').hidden = false;
        }

    </script>
@stop
