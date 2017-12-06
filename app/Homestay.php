<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_homestay',  'harga', 'kuota', 'lat', 'long', 'foto_1', 'foto_2', 'foto_3'
    ];
}
