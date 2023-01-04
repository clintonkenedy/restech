
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>FACTURAS PAGADAS</h2>
</center>
@stop

@section('content')
<div class="container">
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>ID</th>
            <th>DNI</th>
            <th>NOMBRES</th>
            <th>CELULAR</th>
            <th>ESTADO</th>
            <th>MESA</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($facturas as $factura)
                <tr class="">
                    <td>{{$factura->id}}</td>
                    <td>{{$factura->dni}}</td>
                    <td>{{$factura->nombres}}</td>
                    <td>{{$factura->celular}}</td>
                    <td> <span class="badge bg-success">{{$factura->estado}}</span></td>
                    @php
                        $ticket = App\Models\Ticket::where("factura_id", $factura->id)->first();
                    @endphp
                    <td>{{$ticket->mesa->numero}}</td>
                    <td>
                        <a href="{{route('facturas.show', $factura)}}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // const a_fecha = async (id_plato, plato_fecha) => {
        //     // const token = document.getElementsByName('_token')[0].value;
        //     // const oficina = document.getElementById('info_oficina').value;
        //     // const password = document.getElementById('passoficina').value;
        //     // verificacion?_token=keMDARbh8LXN0BRiXkoysdEyBP4GSi0j1iYOYwDj&oficina=2&password=123
        //     try {
        //         const resp = await fetch('/platos_fecha?id='+id_plato+'&fecha='+plato_fecha);

        //         if (!resp.ok) {
        //             console.log("Server conexion error");
        //         }
        //         const data = await resp.json();
        //         // document.getElementById("a_total_tickets").innerText = "Tickets: "+ data.total_tickets;
        //         console.log(data);
        //     } catch (error) {
        //         console.log(error);
        //     }
        // }

    </script>
@stop
