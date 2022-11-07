@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>TICKETS</h1>
    </center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark bg bg-primary">EDITAR TICKET</h4>
                    <div class="card-body">
{{--                        {!! Form::open(array('route'=>['teatro.update', $evento],'method'=>'POST','class'=>'mt-2')) !!}--}}
{{--                        @method('PUT')--}}
                        <form action="{{route('tickets.update', $ticket)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="plato" class="form-label">
                                    Plato:
                                    <span style="color: red;">*</span>
                                </label>
                                {{-- <input type="text" class="form-control" value="{{$ticket->plato->nombre}}" name="plato"> --}}
                                <select name="plato" id="" class="form-control">
                                    @foreach ($platos as $plato)
                                        @if ($plato->nombre == $ticket->plato->nombre)
                                        <option value="{{$plato->id}}" selected>{{$plato->nombre}}</option>
                                        @else
                                        <option value="{{$plato->id}}">{{$plato->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mesa" class="form-label">
                                    Mesa:
                                    <span style="color: red;">*</span></label>
                                {{-- <input type="text" class="form-control" value="{{$ticket->mesa->numero}}" name="mesa"> --}}
                                <select name="mesa" id="" class="form-control">
                                    @foreach ($mesas as $mesa)
                                        @if ($mesa->numero == $ticket->mesa->numero)
                                        <option value="{{$mesa->id}}" selected>{{$mesa->numero}}</option>
                                        @else
                                        <option value="{{$mesa->id}}">{{$mesa->numero}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="factura" class="form-label">
                                    # Factura:
                                    <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="" name="factura" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                    <span style="color: red;">*</span>
                                </label>
                                <select id="" class="form-control" name="estado">
                                    <option value="En espera">En espera</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Listo">Listo</option>
                                </select>
                            </div>

                        </div>
                        <center>
                            <a href="../pendientes/list" class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary">Confirmar</button>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop






