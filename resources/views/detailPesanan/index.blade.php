@extends('layouts/app')

@section('content')
 <div class="container">
    <h1>List Pemesan</h1>

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
                 <th style="text-align:center;">User</th>
                 <th style="text-align:center;">Alamat Pengiriman</th>
                 <th style="text-align:center;">Jumlah Pesanan</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($detailPemesan as $detail)

                 <tr>
                     <td style="text-align:center;">{{ $detail->user }}</td>
                     <td style="text-align:center;">{{ $detail->alamat_pengiriman }}</td>
                     <td style="text-align:center;">{{ $detail->jumlah_pesanan }}</td>
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