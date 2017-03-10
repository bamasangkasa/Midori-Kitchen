@extends('layouts.app')
@section('content')
<div class="container">
    <h1> 
    <img src="../img/logo_midori.png" style="width:2em;height:auto;margin-right:0em;padding:0;">
        Create Food
    </h1>
    {!! Form::open(['url' => 'foods', 'files'=> true]) !!}
    <div class="form-group">
        {!! Form::label('Nama', 'Nama:') !!}
        {!! Form::text('nama',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Makanan', 'Makanan:') !!}
        {!! Form::text('makanan',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Harga', 'Harga:') !!}
        {!! Form::text('harga',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tanggal Jual', 'Tanggal Jual:') !!}
        {!! Form::date('tanggal_jual',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Deskripsi', 'Deskripsi:') !!}
        {!! Form::text('deskripsi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Foto', 'Foto:') !!}
        {!! Form::file('foto',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop