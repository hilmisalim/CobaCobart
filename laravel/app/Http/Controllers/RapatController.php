<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RapatRequest;
use App\Rapat;
use Input;
use DB;
use Excel;
use Auth;

class RapatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $rapats = DB::table('rapats')->where('rt_id', '=', $id)->get();
        return view ('rapat.index', compact('rapats'));   
    }

    public function create()
    {
        return view('rapat.create');
    }

    public function store(RapatRequest $request)
    {
            Rapat::create($request->all());
            return redirect()->route('rapat.index')->with('message',"Jadwal '$request->nm_rapat' telah berhasil ditambahkan.");
    }

    public function show(Rapat $rapat)
    {
        $id = Auth::user()->id;
        $data= Rapat::where([['id_rapat','=', $rapat->id_rapat],['rt_id', '=', $id]])->get();

        if($data->isEmpty()){
            return redirect()->route('rapat.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
        return view('rapat.show',compact('data'));
        }
    }

    public function edit(Rapat $rapat)
    {
        $id = Auth::user()->id;
        $data= Rapat::where([['id_rapat','=', $rapat->id_rapat],['rt_id', '=', $id]])->get();

        if($data->isEmpty()){
            return redirect()->route('rapat.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
        return view('rapat.edit',compact('data'));
        }
    }

    public function update(RapatRequest $request, Rapat $rapat)
    {
        $rapat->update($request->all());
        return redirect()->route('rapat.index')->with('message',"Jadwal '$rapat->nm_rapat' telah berhasil diperbaharui");
    }

    public function destroy(Rapat $rapat)
    {
        $rapat->delete();
        return redirect()->route('rapat.index')->with('message',"Jadwal '$rapat->nm_rapat' telah berhasil dihapus");
    }

    public function getImportKal(){
        return view('rapat.importKal');
    }

    public function postImportKal(){
        Excel::load(Input::file('rapat'),function($reader){
            $reader->each(function($sheet){
                Rapat::firstOrCreate($sheet->toArray());
            });
        });
    return redirect()->route('rapat.index');
    }

    public function getExportKal(){
        $id = Auth::user()->id;        
        $kalender=Rapat::where('rt_id', '=', $id)->get();
        Excel::create('Export Data Rapat',function($excel) use($kalender){
            $excel->sheet('Sheet 1',function($sheet) use($kalender){
                $sheet->fromArray($kalender);
            });
        })->export('xlsx');
    }

    public function deleteAllKal(){
        $id = Auth::user()->id;
        DB::table('rapats')->where('rt_id','=',$id)->delete();
        return redirect()->route('rapat.index');
    }
}
