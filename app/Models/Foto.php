<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';

    protected $fillable = [
        'nome_file',

    ];

    public function annunci()
    {
        return $this->belongsToMany(Annuncio::class, 'annuncio_foto', 'foto_id', 'annuncio_id');
    }

}
