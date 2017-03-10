<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\detailPemesan;
//excel
use Input;
use DB;
use Excel;

class detailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $detail=detailPemesan::find($id);
        return view('detailPesanan.index',compact('detail'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $detail=detailPemesan::where('id',$id)->get();
       return view('detailPesanan.show',compact('detail'));
    }

    public function downloadExcel($type)
    {
        $data = detailPemesan::get()->toArray();
        return Excel::create('Midori-Kitchen-User-Pesanan', function($excel) use ($data) {
            $excel->sheet('Menu', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                                 'User'          => $value->user, 
                                 'Alamat'        => $value->alamat, 
                                 'Jumlah Pesanan'=> $value->jumlah_pesanan
                                ];
                }
                if(!empty($insert)){
                    DB::Food('items')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
}
