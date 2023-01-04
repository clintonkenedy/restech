<div>
    <div style="display: flex; flex-wrap: wrap; justify-content: start; ">
        @foreach ($tickets as $ticket)
            @if ($ticket->estado == "En espera")
            <div class="card text-white bg-warning m-3" style="width: 14rem;">
                <div class="card-header h4">{{ 'Pedido #'.$ticket->id }}</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <b>{{$ticket->plato->nombre}} x <span class="badge bg-lightblue" style="font-size: 18px">{{$ticket->cantidad}}</span></b>
                    </h4>
                    <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                </div>
                <div class="card-footer" >
                    <div style="display: flex; justify-content: space-between;">
                        {{-- <form action="{{ route("tickets.ticket_cancelado", $ticket->id )}}" method="post">
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form> --}}
                        <button class="btn btn-danger" wire:click="ticket_cancelado({{$ticket}})"><i class="fas fa-trash"></i></button>
                        {{-- <form action="{{ route("tickets.ticket_listo", $ticket->id )}}" method="post">
                            @csrf
                            <button class="btn btn-success"><i class="fas fa-check"></i></button>
                        </form> --}}
                        <button class="btn btn-success" wire:click="ticket_listo({{$ticket}})"><i class="fas fa-check"></i></button>
                    </div>
                </div>
                </div>
            @endif
            @if ($ticket->estado == "Listo")
            <div class="card text-white bg-success m-3" style="width: 14rem;">
                <div class="card-header">{{ 'Pedido #'.$ticket->id }}</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>{{$ticket->plato->nombre}}</b>
                        </h4>
                        <p class="card-text">Mesa N° {{$ticket->mesa->numero}}</p>
                    </div>
                    <div class="card-footer" >
                        <center>
                            <button class="btn btn-primary"><i class="fas fa-bell"></i></button>
                        </center>
                    </div>
                </div>
            @endif
    @endforeach
    </div>
</div>
