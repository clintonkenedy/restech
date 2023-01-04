<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($platos as $plato)
            <div class="card text-white bg-warning m-3" style="width: 14rem;">
                <div class="card-header h4">{{ 'Plato #'.$plato->id }}</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <b>{{$plato->nombre}}</b>
                        <p class="text-right">
                            <input type="date" value="{{$plato->fecha}}" name="fecha" id="fecha" class="form-control" wire:change='plato_fecha({{$plato}}, this.value)' onchange="asd(this.value)">
                        </p>
                    </h4>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        <button class="btn btn-danger" wire:click="ticket_cancelado({{$plato}})"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-primary" wire:click="ticket_listo({{$plato}})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-success" wire:click="ticket_listo({{$plato}})"><i class="fas fa-calendar"></i></button>

                    </div>
                </div>
                </div>
    @endforeach
    </div>
</div>
