@extends('layouts/app')

@section('content')
 <div class="container">
    <h1>List Makanan</h1>

    <a href="{{url('/foods/create')}}" class="btn btn-success">+ Food</a>

    <div class="dt-buttons btn-group" style="left:62.5em;">
        <a href="{{ URL::to('downloadExcel/xls') }}" class="btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons">
            <span>Excel xls</span>
        </a>
        <a href="{{ URL::to('downloadExcel/xlsx') }}" class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons">
            <span>Excel xlsx</span>
        </a>
        <a href="{{ URL::to('downloadExcel/csv') }}" class="btn btn-default buttons-excel buttons-flash btn-sm" tabindex="0" aria-controls="datatable-buttons">
            <span>CSV</span>
        </a>
    </div>

     <div class="table-responsive" style="margin-top:1em;">
         <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
             <thead>
             <tr class="bg-info">
                 <th style="text-align:center;">Nama</th>
                 <th style="text-align:center;">Makanan</th>
                 <th style="text-align:center;">Harga</th>
                 <th style="text-align:center;">Tanggal Jual</th>
                 <th style="text-align:center;">Deskripsi</th>
                 <th style="text-align:center;">Jumlah Pesanan</th>
                 <th style="text-align:center;">Foto</th>
                 <th colspan="3" style="text-align:center;">Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($foods as $food)

                 <tr>
                     <td style="text-align:center;">{{ $food->nama }}</td>
                     <td style="text-align:center;">{{ $food->makanan }}</td>
                     <td style="text-align:center;">{{ $food->harga }}</td>
                     <td style="text-align:center;">{{ $food->tanggal_jual }}</td>
                     <td style="text-align:center;">{{ $food->deskripsi }}</td>
                     <td style="text-align:center;"><a href="{{url('detailPemesan',$food->id)}}" class="btn btn-success">{{ $food->jumlah_pesanan }}</a></td>
                     <td style="text-align:center;"><img src="{{asset('img/'.$food->foto)}}" height="35" width="30"></td>
                     <td style="text-align:center;"><a href="{{url('foods',$food->id)}}" class="btn btn-primary">Read</a></td>
                     <td style="text-align:center;"><a href="{{route('foods.edit',$food->id)}}" class="btn btn-warning">Update</a></td>
                     <td style="text-align:center;">
                     {!! Form::open(['method' => 'DELETE', 'route'=>['foods.destroy', $food->id]]) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                     {!! Form::close() !!}
                     </td>
                 </tr>
             @endforeach

             </tbody>

         </table>
     </div>
     <div>
        <form style="border: 4px solid #a1a1a1;margin-left: 65em;margin-top: 0.5em;padding: 10px;width:20%;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="file" name="import_file" />
            <button style="margin-top:1em;" class="btn btn-primary">Import File</button>
        </form>
      </div>
 </div>
@endsection