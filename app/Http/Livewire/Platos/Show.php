<?php

namespace App\Http\Livewire\Platos;

use Livewire\Component;
use App\Models\Plato;

class Show extends Component
{
    public $platos = '';
    public $dia;
    public function plato_fecha(Plato $plato, $fecha)
    {
        dd($fecha);
    }
    public function mount()
    {
        $this->platos = Plato::orderBy('nombre','asc')->get();
    }
    public function render()
    {
        return view('livewire.platos.show', [
            $this->platos,
        ]);
    }
}
