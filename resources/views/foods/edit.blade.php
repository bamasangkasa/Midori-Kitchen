@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="margin-bottom:1em;">Update Food</h1>
    {!! Form::model($food,['method' => 'PATCH','route'=>['foods.update',$food->id]]) !!}
    <div class="form-group">
        {!! Form::label('Nama', 'Nama:') !!}
        {!! Form::text('nama',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Harga', 'Harga:') !!}
        {!! Form::text('harga',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tanggal Jual', 'Tanggal Jual:') !!}
        {!! Form::text('tanggal_jual',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Deskripsi', 'Deskripsi:') !!}
        {!! Form::text('deskripsi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Foto', 'Foto:') !!}
        {!! Form::text('foto',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop