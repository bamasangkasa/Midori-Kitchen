<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
   //
    protected $fillable=[
        'nama',
        'makanan',
        'harga',
        'tanggal_jual',
        'deskripsi',
        'jumlah_pesanan',
        'foto'
    ];
}

