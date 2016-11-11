<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AdminRequest;
use App\User;
use App\Users;
use App\Pakerte;
use Input;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.index',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(AdminRequest $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);        
        //echo $user;
        return view('admin.edit', compact('user'));
    }

    public function update(AdminRequest $request,$user)
    {
        $u = Users::findOrfail($user);

        DB::table('users')
            ->where('id', $u->id)
            ->update([
                    'name' => $request['name'],
                    'alamat' => $request['alamat'],
                    'rt' => $request['rt'],
                    'rw' => $request['rw'],
                    'kd_pos' => $request['kd_pos'],
                    'kelurahan' => $request['kelurahan'],
                    'kecamatan' => $request['kecamatan'],
                    'kota' => $request['kota'],
                    'provinsi' => $request['provinsi'],
                    'no_hp' => $request['no_hp'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                ]);

        return redirect()->route('admin.index')->with('message',"Profil '$request->name' telah berhasil diperbaharui.");

    }

    public function destroy($id)
    {
        //
    }
}
