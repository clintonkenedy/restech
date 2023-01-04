
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>MESAS</h2>
</center>
@stop

@section('content')
<div class="row d-flex justify-content-between mb-4">
    <div class="col-md-2">

    </div>
    <div class="col-md-3">
        <div class="float-right">
            <a href="{{route('mesas.create')}}" class="btn btn-lg btn-success">
                Registrar Nuevo Mesa
            </a>
        </div>
    </div>
</div>
<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($mesas as $mesa)
        @if ($mesa->estado == 'Ocupado')
        <div class="card text-white bg-warning m-3" style="width: 14rem;">
            <div class="card-header h4">{{ 'Mesa #'.$mesa->numero }}</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{-- <b>{{$mesa->numero}}</b> --}}
                    <p>Estado <b>{{$mesa->estado}}</b></p>
                </h4>
            </div>
        </div>
        @endif
        @if ($mesa->estado == 'Disponible')
        <div class="card text-white bg-success m-3" style="width: 14rem;">
            <div class="card-header h4">{{ 'Mesa #'.$mesa->numero }}</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{-- <b>{{$mesa->numero}}</b> --}}
                    <p>Estado <b>{{$mesa->estado}}</b></p>
                </h4>
            </div>
            <div class="card-footer" >
                <div style="display: flex; justify-content: space-between;">
                    {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
                    <a href="{{route('mesas.suspender', $mesa)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="{{route('mesas.pedidos', $mesa)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
        @endif
        @if ($mesa->estado == 'Suspendido')
        <div class="card text-white bg-danger m-3" style="width: 14rem;">
            <div class="card-header h4">{{ 'Mesa #'.$mesa->numero }}</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{-- <b>{{$mesa->numero}}</b> --}}
                    <p>Estado <b>{{$mesa->estado}}</b></p>
                </h4>
            </div>
            <div class="card-footer" >
                <div style="display: flex; justify-content: end;">
                    {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
                    <a href="{{route('mesas.activar', $mesa)}}" class="btn btn-primary"><i class="fas fa-check"></i></a>
                </div>
            </div>
        </div>
        @endif

    @endforeach
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
