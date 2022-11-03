<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }
    public function plato(){
        return $this->belongsTo(Plato::class);
    }
    public function facturas(){
        return $this->hasMany(Factura::class);
    }
}
