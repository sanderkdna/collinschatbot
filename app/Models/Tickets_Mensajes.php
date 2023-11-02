<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets_Mensajes extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'usuario',
        'mensaje'
    ];
}
