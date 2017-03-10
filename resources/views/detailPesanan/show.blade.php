@extends('layouts/app')

@section('content')
 <div class="container">
    <h1>Pesanan User</h1>

    <div class="dt-buttons btn-group" style="left:68em;">
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
                 <th style="text-align:center;">User</th>
                 <th style="text-align:center;">Alamat Pengiriman</th>
                 <th style="text-align:center;">Jumlah Pesanan</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($detail as $food)

                 <tr>
                     <td style="text-align:center;">{{ $food->user }}</td>
                     <td style="text-align:center;">{{ $food->alamat_pengiriman }}</td>
                     <td style="text-align:center;">{{ $food->jumlah_pesanan }}</td>
                 </tr>
             @endforeach

             </tbody>

         </table>
     </div>
     <div class="form-group" style="margin-left:-18em;">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="{{ url('detailPesanan')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
     <div>
        <form style="border: 4px solid #a1a1a1;margin-left: 65em;margin-top: 0.5em;padding: 10px;width:20%;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="file" name="import_file" />
            <button style="margin-top:1em;" class="btn btn-primary">Import File</button>
        </form>
      </div>
 </div>
@endsection