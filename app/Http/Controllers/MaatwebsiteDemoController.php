<?php
namespace App\Http\Controllers;

use App\Food;
use DB;
use Excel;

class MaatwebsiteDemoController extends Controller
{
	public function importExport()
	{
		return view('importExport');
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
                                 'Harga'        => $value->harga,
                                 'Tanggal Jual' => $value->tanggal_jual,
                                 'Deskripsi'    => $value->deskripsi,
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
?>