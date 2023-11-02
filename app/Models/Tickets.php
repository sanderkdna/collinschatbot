<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket',
        'fecha_creacion',
        'fecha_finalizacion',
        'estado',
        'contact_name',
        'abierto'
    ];
}
