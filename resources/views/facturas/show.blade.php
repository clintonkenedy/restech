
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
            <th>COSTO</th>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr class="">
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->estado}}</td>
                    <td>{{$ticket->mesa->numero}}</td>
                    <td>{{$ticket->plato->nombre}}</td>
                    <td name="costo">{{$ticket->plato->costo}}</td>
                </tr>
            @endforeach
                <tr class="bg bg-blue">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><b class="h5" id="total">29.99</b></td>
                </tr>
            </tbody>
        </table>
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
            document.getElementById('total').innerHTML = total;
        });


    </script>
@stop
