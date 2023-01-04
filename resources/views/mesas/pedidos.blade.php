
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>PEDIDOS MESA N°: {{$mesa->numero}}</h2>
</center>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card text-white bg-warning mb-3" style="">
            <div class="card-body">
                <form action="{{route('mesas.pedido_store', $mesa)}}" method="get">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-group form-group-lg">
                                <h4>PLATOS</h4>
                                @foreach ($platos as $plato)
                                <div class="form-check ml-5 mb-3">
                                    <input class="form-check-input" value="{{$plato->id}}"  type="checkbox" id="defaultCheck1" name="pedidos[]">
                                    <label class="form-check-label" for="defaultCheck1">{{$plato->nombre}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <a href="./" class="btn btn-lg btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-lg btn-success float-right">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <style>
        input[type=checkbox]
        {
            /* Double-sized Checkboxes */
            -ms-transform: scale(2); /* IE */
            -moz-transform: scale(2); /* FF */
            -webkit-transform: scale(2); /* Safari and Chrome */
            -o-transform: scale(2); /* Opera */
            transform: scale(2);
            padding: 10px;
        }

        /* Might want to wrap a span around your checkbox text */
        .checkboxtext
        {
        /* Checkbox text */
        font-size: 110%;
        display: inline;
        }
    </style>
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
