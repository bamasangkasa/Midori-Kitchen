<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Food;
//excel
use Input;
use DB;
use Excel;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $foods=Food::all();
        return view('foods.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    
    public function store()
    {

        //$food=Request::all();
        
        \Validator::make(\Request::all(), 
        [
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        //------- Get image & set filename -------- -------------
        $nama = \Request::input("nama");
        $makanan = \Request::input("makanan");
        $harga = \Request::input("harga");
        $tanggal_jual = \Request::input("tanggal_jual");
        $jumlah_pesanan = "0";
        $deskripsi = \Request::input("deskripsi");
        $image = \Request::file("foto");

        $input['imagename'] = time().'-foto-'.'.'.$image->getClientOriginalExtension();

        //------- Set path & create dir if doesn't exist --------
        $destinationPath = public_path('tempFood');
        if(!(\File::exists($destinationPath))){
             \File::makeDirectory($destinationPath, 0777, true);
        }        
        //------- Copy the file for original image --------------
        $image->move($destinationPath,$input['imagename']);

        //------- Create image url ------------------------------
        $linkImg = 'tempFood/'.$input['imagename'];

        //================== END AVATAR =============== =========

        $food = array(
            "nama"          => $nama,
            "makanan"       => $makanan,
            "harga"         => $harga,
            "tanggal_jual"  => $tanggal_jual,
            "jumlah_pesanan"=> $jumlah_pesanan,
            "deskripsi"     => $deskripsi,
            "foto"          => $linkImg
        );
        Food::create($food);

       return redirect('foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $food=Food::find($id);
       return view('foods.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id)
    {
       $food=Food::find($id);
       return view('foods.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
       $foodUpdate=Request::all();
       $food=Food::find($id);
       $food->update($foodUpdate);
       return redirect('foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect('foods');
    }

    public function downloadExcel($type)
    {
        $data = Food::get()->toArray();
        return Excel::create('Midori-Kitchen-Menu', function($excel) use ($data) {
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
                                 'Nama'         => $value->nama, 
                                 'Makanan'      => $value->makanan, 
                                 'Harga'        => $value->harga,
                                 'Tanggal Jual' => $value->tanggal_jual,
                                 'Deskripsi'    => $value->deskripsi,
                                 'Jumlah Pesanan'=> $value->jumlah_pesanan,
                                 'Foto'         => $value->foto
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
