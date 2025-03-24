<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabellaUnificata extends Model
{
    use HasFactory;

    protected $table = 'tabella_unificata';

    protected $fillable = [
        'nome',
        'descrizione',

    ];

}
