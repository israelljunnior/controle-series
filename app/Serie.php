<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // opcional protected $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome'];
}
