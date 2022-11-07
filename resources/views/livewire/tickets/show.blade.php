<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($tickets as $ticket)
            @if ($ticket->estado == "En espera")
            <div class="card text-white bg-warning m-3" style="min-width: 15rem;">
                <div class="card-header">{{ '#'.$ticket->id }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$ticket->plato->nombre}}</h5>
                    <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success"><i class="fas fa-check"></i></button>
                    </div>
                </div>
                </div>
            @endif
            @if ($ticket->estado == "Listo")
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ '#'.$ticket->id }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$ticket->plato->nombre}}</h5>
                        <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                    </div>
                </div>
            @endif
            @if ($ticket->estado == "Cancelado")
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ '#'.$ticket->id }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$ticket->plato->nombre}}</h5>
                    <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                </div>
            @endif
    @endforeach
    </div>
</div>
