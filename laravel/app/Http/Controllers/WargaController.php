<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\WargaRequest;
use App\Warga;
use Input;
use DB;
use Excel;
use Auth;

class WargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    protected $layout = 'layouts.dashboard';

    public function index(){
        $id = Auth::user()->id;
        $wargas = DB::table('wargas')->where('rt_id', '=', $id)->get();

        return view ('warga.index', compact('wargas'));   
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(WargaRequest $request)
    {
        $cek = DB::table('wargas')
                ->where('nik_warga', '=', $request->nik_warga)
                ->count();

        if($cek >= '1'){
            return redirect()->route('warga.index')->with('gagal',"Gagal menambahkan, data dengan NIK '$request->nik_warga' sudah terdaftar");
        }
        else{
            Warga::create($request->all());
            return redirect()->route('warga.index')->with('message',"Data warga dengan nama '$request->nm_lengkap' telah berhasil ditambahkan.");
        }
    }

    public function show(Warga $warga)
    {
        $id = Auth::user()->id;
        $data= Warga::where([['nik_warga','=', $warga->nik_warga],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('warga.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
        return view('warga.show',compact('data'));
        }
    }

    public function edit(Warga $warga)
    {
        $id = Auth::user()->id;
        $data= Warga::where([['nik_warga','=', $warga->nik_warga],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('warga.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
        return view('warga.edit',compact('data'));
        }
    }

    public function update(WargaRequest $request, Warga $warga)
    {
        $warga->update($request->all());
        return redirect()->route('warga.index')->with('message',"data '$warga->nm_lengkap' telah berhasil diperbaharui");
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')->with('message',"data '$warga->nm_lengkap' telah berhasil dihapus");
    }

    public function getImportWar(){
        return view('warga.importWarga');
    }

    public function postImportWar(){
        Excel::load(Input::file('warga'),function($reader){
            $reader->each(function($sheet){
                Warga::firstOrCreate($sheet->toArray());
            });
        });
    return redirect()->route('warga.index')->with('message',"Import data telah berhasil");;
    }

    public function getExportWar(){
        $id = Auth::user()->id;        
        $warga=Warga::where('rt_id', '=', $id)->get();
        Excel::create('Export Data Warga',function($excel) use($warga){
            $excel->sheet('Sheet 1',function($sheet) use($warga){
                $sheet->fromArray($warga);
            });
        })->export('xlsx');
    }

    public function deleteAllWar(){
        $id = Auth::user()->id;
        DB::table('wargas')->where('rt_id','=',$id)->delete();
        return redirect()->route('warga.index');
    }
}
