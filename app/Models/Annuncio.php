<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{

        protected $table = 'annunci';


        protected $fillable = [
            'title',
            'images',
            'adType',
            'description',
            'condition',
            'price',
            'position',
            'user_id',


        ];



        protected $casts = [
            'images' => 'array',
        ];

        protected $attributes = [
            'description' => '',
            'price' => 0,
        ];

        public function fotos()
        {
            return $this->belongsToMany(Foto::class, 'annuncio_foto', 'annuncio_id', 'foto_id',);
        }

        public function seller()
        {
            return $this->belongsTo(User::class, 'user_name', 'name');
        }



        public function user(){
            return $this->belongsTo(User::class, 'user_id');
        }

        public function fotoId()
{
        return $this->hasMany(FotoId::class, 'annuncio_id');
}



}
