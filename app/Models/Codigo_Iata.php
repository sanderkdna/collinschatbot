<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo_Iata extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'aerolinea'
    ];
}
