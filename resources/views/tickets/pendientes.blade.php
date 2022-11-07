@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>TICKETS PENDIENTES</h1>
    </center>
@stop

@section('content')
<div class="row justify-content-end mb-4">
    <div class="col-md-3">
        <div class="float-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_pedido">
                <span class="fa fa-edit"></span>
                Nuevo Pedido
                </button>
        </div>
    </div>
</div>
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>PLATO</th>
            <th>MESA</th>
            <th># Factura</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr class="">
                    <td>{{$ticket->plato->nombre}}</td>
                    <td>{{$ticket->mesa->numero}}</td>
                    <td> #1231232 </td>
                    <td><h5><span class="badge bg-warning"> {{$ticket->estado}} </span></h5></td>
                    <td>
                        <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('tickets.destroy', $ticket->id)}}" method="post" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{-- MODAAAAAL --}}
<div class="modal fade" id="m_pedido" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">NUEVO PEDIDO</h4>
            </div>
            <div class="modal-body">
                <form id="crearEvento" name="crearEvento" class="mt-2"  action="{{route('tickets.store')}}" method="POST">
                @method('POST')
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="fecha" class="col-form-label col-form-label-lg">
                            <b>MESA</b>
                            <span style="color: red;">*</span></label>
                            <select name="mesa" id="" class="form-control" name="mesa">
                                @foreach ($mesas as $mesa)
                                    <option value="{{$mesa->id}}">{{$mesa->numero}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="evento" class="col-form-label col-form-label-lg">
                            <b>PLATO</b>
                        <span style="color: red;">*</span></label>
                        <select name="plato" id="" class="form-control">
                            @foreach ($platos as $plato)
                                <option value="{{$plato->id}}">{{$plato->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-danger" style="background-color: #FF0017" data-dismiss="modal"><b>Cancelar</b></button>
                    <button class="btn btn-success"><b>Guardar</b></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#pendientes').DataTable();
        });
    </script>
@stop






