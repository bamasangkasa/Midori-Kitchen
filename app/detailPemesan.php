<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesan extends Model
{
	protected $table='detail_pemesans';

    protected $fillable=[
        'user',
        'alamat_pengiriman',
        'jumlah_pesanan'
    ];

    public $timestamps = false;
}