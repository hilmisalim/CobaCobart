<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HimbauanRequest;
use App\Himbauan;
use Input;
use DB;
use Excel;
use Auth;

class HimbauanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $himbauans = DB::table('himbauans')->where('rt_id', '=', $id)->get();
        return view ('himbauan.index', compact('himbauans'));   
    }

    public function create()
    {
        return view('himbauan.create');
    }

    public function store(HimbauanRequest $request)
    {
        Himbauan::create($request->all());
        return redirect()->route('himbauan.index')->with('message',"Himbauan '$request->nm_himbauan'warga telah berhasil ditambahkan.");
    }

    public function show(Himbauan $himbauan)
    {   
        $id = Auth::user()->id;
        $data= Himbauan::where([['id_himbauan','=', $himbauan->id_himbauan],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('himbauan.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
            return view('himbauan.show',compact('data'));
        }
    }

    public function edit(Himbauan $himbauan)
    {
        $id = Auth::user()->id;
        $data= Himbauan::where([['id_himbauan','=', $himbauan->id_himbauan],['rt_id', '=', $id]])->get();
        
        if($data->isEmpty()){
            return redirect()->route('himbauan.index')->with('gagal',"Data tidak ditemukan");
        }
        else{
            return view('himbauan.edit',compact('data'));
        }
    }

    public function update(HimbauanRequest $request, Himbauan $himbauan)
    {
        $himbauan->update($request->all());
        return redirect()->route('himbauan.index')->with('message',"Himbauan '$himbauan->nm_himbauan' telah berhasil diperbaharui");
    }

    public function destroy(Himbauan $himbauan)
    {
        $himbauan->delete();
        return redirect()->route('himbauan.index')->with('message',"Himbauan '$himbauan->nm_himbauan' telah berhasil dihapus");
    }

    public function getImportHimb(){
        return view('himbauan.importHimb');
    }

    public function postImportHimb(){
        Excel::load(Input::file('himbauan'),function($reader){
            $reader->each(function($sheet){
                Himbauan::firstOrCreate($sheet->toArray());
            });
        });
    return redirect()->route('himbauan.index');
    }

    public function getExportHimb(){
        $id = Auth::user()->id;
        $himbauan=Himbauan::where('rt_id', '=', $id)->get();
        Excel::create('Export Data Himbauan',function($excel) use($himbauan){
            $excel->sheet('Sheet 1',function($sheet) use($himbauan){
                $sheet->fromArray($himbauan);
            });
        })->export('xlsx');
    }

    public function deleteAllHimb(){
        $id = Auth::user()->id;
        DB::table('himbauans')->where('rt_id', '=', $id)->delete();
        return redirect()->route('himbauan.index');
    }
}
