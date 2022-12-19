<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($tickets as $ticket)
            @if ($ticket->estado == "En espera")
            <div class="card text-white bg-warning m-3" style="width: 14rem;">
                <div class="card-header h4">{{ 'Pedido #'.$ticket->id }}</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <b>{{$ticket->plato->nombre}}</b>
                    </h4>
                    <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        <form action="{{ route("tickets.ticket_cancelado", $ticket->id )}}" method="post">
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        <form action="{{ route("tickets.ticket_listo", $ticket->id )}}" method="post">
                            @csrf
                            <button class="btn btn-success"><i class="fas fa-check"></i></button>
                        </form>
                    </div>
                </div>
                </div>
            @endif
            @if ($ticket->estado == "Listo")
            <div class="card text-white bg-success m-3" style="width: 14rem;">
                <div class="card-header">{{ 'Pedido #'.$ticket->id }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$ticket->plato->nombre}}</h5>
                        <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                    </div>
                    <div class="card-footer" >
                        <center>
                            <button class="btn btn-primary"><i class="fas fa-bell"></i></button>
                        </center>
                    </div>
                </div>
            @endif
            @if ($ticket->estado == "Cancelado")
            <div class="card text-white bg-danger mb-3" style="max-width: 14rem;">
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
