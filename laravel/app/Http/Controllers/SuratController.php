<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SuratRequest;
use App\Surat;
use App\Warga;
use Input;
use DB;
use Excel;
use Auth;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $surats = DB::table('surats')->where('rt_id', '=', $id)->get();
        return view ('surat.index', compact('surats'));   
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(SuratRequest $request)
    {
        //echo $request->nik_warga;
        $id = Auth::user()->id;
        $ms= Warga::where([['nik_warga','=', $request->nik_warga],['rt_id', '=', $id]])->get();
        
        //echo $ms;
        if(count($ms) >= 1){
         
            Surat::create($request->all());
            //echo $request['jns_surat'];
            if ($request['jns_surat']=='Pengantar'){
                return view ('surat.pengantar',compact('ms'));
            }

            elseif ($request['jns_surat']=='Domisili'){
                return view ('surat.domisili',compact('ms'));}

            elseif ($request['jns_surat']=='Kelahiran'){
                return view ('surat.kelahiran',compact('ms'));}
                
            else{
                return view ('surat.kematian',compact('ms'));}
            }

        else {
        return redirect()->route('surat.index')->with('gagal',"Surat untuk '$request->nik_warga' gagal dibuat, pastikan NIK yang dimasukan benar NIK warga anda.");
        }
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat.index')->with('message',"Data dengan nomor surat '$surat->no_surat' telah berhasil dihapus");
    }

    public function getImportSur(){
        return view('surat.importSurat');
    }

    public function postImportSur(){
        Excel::load(Input::file('surat'),function($reader){
            $reader->each(function($sheet){
                Surat::firstOrCreate($sheet->toArray());
            });
        });
    return redirect()->route('surat.index')->with('message',"Import data telah berhasil");;
    }

    public function getExportSur(){
        $id = Auth::user()->id;
        $surat= Surat::where('rt_id', '=', $id)->get();

        Excel::create('Export Data Surat',function($excel) use($surat){
            $excel->sheet('Sheet 1',function($sheet) use($surat){
                $sheet->fromArray($surat);
            });
        })->export('xlsx');
    }

    public function deleteAllSur(){
        $id = Auth::user()->id;
        DB::table('surats')->where('rt_id', '=', $id)->delete();
        return redirect()->route('surat.index');
    }

    public function cobaPhpWord(){

    return  view('surat.cobaWord');

    }
}
