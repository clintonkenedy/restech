
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h2>CREAR MESA</h2>
</center>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-white bg-warning mb-3" style="">
            <div class="card-header">Crear Nuevo Mesa</div>
            <div class="card-body">
                <form action="{{route('mesas.store')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Número</label>
                        <input type="text" name="n_mesa" id="nombre" class="form-control">
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
