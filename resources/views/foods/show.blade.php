@extends('layouts/app')
@section('content')
<div class="container">
    <h1 style="margin-left:2em;margin-bottom:1em;">
        <img src="../img/logo_midori.png" style="width:2em;height:auto;margin-right:0.5em;padding:0;">  Food Show
    </h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="foto" class="col-sm-2 control-label">Foto</label>
            <div class="col-sm-10">
                <img src="{{asset('img/'.$food->foto)}}" height="180" width="180" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder={{$food->nama}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="makanan" class="col-sm-2 control-label">Makanan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="makanan" placeholder={{$food->makanan}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="harga" class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" placeholder={{$food->harga}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="tanggal_jual" class="col-sm-2 control-label">Tanggal Jual</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tanggal_jual" placeholder={{$food->tanggal_jual}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" placeholder={{$food->deskripsi}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah_pesanan" class="col-sm-2 control-label">Jumlah Pesanan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jumlah_pesanan" placeholder={{$food->jumlah_pesanan}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('foods')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
</div>
@stop