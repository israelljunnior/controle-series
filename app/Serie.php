<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // opcional protected $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome', 'categorias_id'];

    public function categorias_id() {
        return $this->hasOne('App\Categoria');
    }
}
