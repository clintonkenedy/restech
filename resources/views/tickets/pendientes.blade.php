@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>TICKETS PENDIENTES</h1>
    </center>
@stop

@section('content')
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>DNI</th>
            <th>CELULAR</th>
            <th>INCIDENCIA</th>
            <th>OFICINA</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            {{-- @foreach ($tickets as $ticket)
                <tr class="">
                    <td>{{$ticket->persona->dni}}</td>
                    <td>{{$ticket->persona->celular}}</td>
                    <td>{{$ticket->incidencia}}</td>
                    <td>{{$ticket->oficina->nombre_oficina}}</td>
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
            @endforeach --}}

            <tr class="">
                <td>12345678</td>
                <td>987654321</td>
                <td>PRUEBA</td>
                <td>ALCALDIA</td>
                <td><h5><span class="badge bg-warning"> Pendiente </span></h5></td>
                <td>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <form action="#" method="post" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
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






