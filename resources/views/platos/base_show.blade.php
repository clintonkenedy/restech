
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>PLATOS</h2>
</center>
@stop

@section('content')
<div class="row d-flex justify-content-between mb-4">
    <div class="col-md-2">

    </div>
    <div class="col-md-3">
        <div class="float-right">
            <a href="{{route('platos.create')}}" class="btn btn-lg btn-success">
                Registrar Nuevo Plato
            </a>
        </div>
    </div>
</div>
<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($platos as $plato)
        @if ($plato->estado == 'Activo')
            <div class="card text-white bg-success m-3" style="width: 14rem;">
                <div class="card-header h4">{{ 'Plato #'.$plato->id }}</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <b>{{$plato->nombre}}</b>
                        <p class="text-right">
                            <br>
                            <input type="date" value="{{$plato->fecha}}" name="fecha" id="fecha" class="form-control" onchange="a_fecha({{$plato->id}}, this.value)">
                        </p>
                        <p>Precio S/ {{$plato->costo}}</p>
                        <p>Estado: {{$plato->estado}}</p>
                    </h4>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
                        <a href="{{route('platos.suspender', $plato)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="{{route('platos.edit', $plato)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    </div>
                </div>
            </div>
        @else
            <div class="card text-white bg-danger m-3" style="width: 14rem;">
                <div class="card-header h4">{{ 'Plato #'.$plato->id }}</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <b>{{$plato->nombre}}</b>
                        <p class="text-right">
                            <br>
                            {{-- <input type="date" value="{{$plato->fecha}}" name="fecha" id="fecha" class="form-control" onchange="a_fecha({{$plato->id}}, this.value)"> --}}
                        </p>
                        <p>Precio S/ {{$plato->costo}}</p>
                        <p>Estado: {{$plato->estado}}</p>
                    </h4>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: end;">
                        <a href="{{route('platos.activar', $plato)}}" class="btn btn-primary"><i class="fas fa-check"></i></a>
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
        const asd = (xd) => {

        }
        const a_fecha = async (id_plato, plato_fecha) => {
            // const token = document.getElementsByName('_token')[0].value;
            // const oficina = document.getElementById('info_oficina').value;
            // const password = document.getElementById('passoficina').value;
            // verificacion?_token=keMDARbh8LXN0BRiXkoysdEyBP4GSi0j1iYOYwDj&oficina=2&password=123
            try {
                const resp = await fetch('/platos_fecha?id='+id_plato+'&fecha='+plato_fecha);

                if (!resp.ok) {
                    console.log("Server conexion error");
                }
                const data = await resp.json();
                // document.getElementById("a_total_tickets").innerText = "Tickets: "+ data.total_tickets;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        }

    </script>
@stop
