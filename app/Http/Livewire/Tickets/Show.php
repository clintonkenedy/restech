<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Show extends Component
{
    public $tickets = '';
    public $asd = 'vamos a ver';
    protected $listeners = ['ticket-listo' => '$refresh', 'ticket-cancelado' => '$refresh'];

    public function prueba()
    {
        $this->asd = 'hola';
    }
    public function ticket_listo(Ticket $ticket)
    {
        $ticket->estado = "Listo";
        $ticket->save();
        $this->emit('ticket-listo');
    }
    public function ticket_cancelado(Ticket $ticket)
    {
        $ticket->estado = "Cancelado";
        $ticket->save();
        $this->emit('ticket-cancelado');
    }

    public function mount()
    {
        $this->tickets = Ticket::orderBy('estado','asc')->where('estado', '!=', 'Cancelado')->get();
    }

    public function render()
    {
        // return view('livewire.tickets.show');
        return view('livewire.tickets.show', [
            $this->tickets, $this->asd
        ]);
    }



}
