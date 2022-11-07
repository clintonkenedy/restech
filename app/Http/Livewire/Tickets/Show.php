<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Show extends Component
{
    // public $tickets;

    // public function mount()
    // {
    //     $this->tickets = Ticket::all();
    // }
    public function render()
    {
        // return view('livewire.tickets.show');

        return view('livewire.tickets.show', [
            'tickets' => \App\Models\Ticket::all()->where('estado', 'En espera')
        ]);
    }
}
