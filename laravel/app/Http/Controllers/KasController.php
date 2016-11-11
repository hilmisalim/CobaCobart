<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\KasRequest;
use App\Kas;
use Input;
use DB;
use Excel;
use Auth;

class KasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $id = Auth::user()->id;
        $kass = DB::table('kas')->where('rt_id', '=', $id)->get();
        return view ('kas.index', compact('kass'));
    }

    public function create()
    {
        return view('kas.create');
    }

    public function store(KasRequest $request)
    {
        Kas::create($request->all());
        return redirect()->route('kas.index')->with('message',"Kas '$request->nm_kas' telah berhasil ditambahkan.");
    }

    public function show(Kas $ka)
    {
        $id = Auth::user()->id;
        $data= Kas::where([['id_kas','=', $ka->id_kas],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('kas.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
            return view('kas.show',compact('data'));
        }
    }   

    public function edit(Kas $ka)
    {
        $id = Auth::user()->id;
        $data= Kas::where([['id_kas','=', $ka->id_kas],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('kas.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
            return view('kas.edit',compact('data'));
        }
    }

    public function update(KasRequest $request, Kas $ka)
    {
        //echo $ka->nm_kas;
        $ka->update($request->all());
        return redirect()->route('kas.index')->with('message',"data kas '$ka->nm_kas' telah berhasil diperbaharui");
    }

    public function destroy(Kas $ka)
    {
        $ka->delete();
        return redirect()->route('kas.index')->with('message',"data kas '$ka->nm_kas' telah berhasil dihapus");
    }

    public function getImportKas(){
        return view('kas.importKas');
    }

    public function postImportKas(){
        Excel::load(Input::file('kas'),function($reader){
            $reader->each(function($sheet){
                Kas::firstOrCreate($sheet->toArray());
            });
        });
    return redirect()->route('kas.index');
    }

    public function getExportKas(){
        $id = Auth::user()->id;
        $kas=Kas::where('rt_id', '=', $id)->get();
        Excel::create('Export Data',function($excel) use($kas){
            $excel->sheet('Sheet 1',function($sheet) use($kas){
                $sheet->fromArray($kas);
            });
        })->export('xlsx');
    }

    public function deleteAllKas(){
        $id = Auth::user()->id;
        DB::table('kas')->where('rt_id','=',$id)->delete();
        return redirect()->route('kas.index');
    }


}
