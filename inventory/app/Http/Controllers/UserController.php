<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ubah(Request $request, $id) {
        $pwh = Hash::make($request->password);
        if ($request->password == "" && $request->role != "") {
            DB::table('users')->where('id', $id)->update([
                'name'=>$request->nama_user,
                'email'=>$request->email,
                'role'=>$request->role
            ]);
        } else if ($request->password != "" && $request->role == "") {
            DB::table('users')->where('id', $id)->update([
                'name'=>$request->nama_user,
                'email'=>$request->email,
                'password'=>$pwh,
            ]);
        } else if ($request->password == "" && $request->role == "") {
            DB::table('users')->where('id', $id)->update([
                'name'=>$request->nama_user,
                'email'=>$request->email,
            ]);
        } else {
            DB::table('users')->where('id', $id)->update([
                'name'=>$request->nama_user,
                'email'=>$request->email,
                'password'=>$pwh,
                'role'=>$request->role
            ]);
        }
        return redirect('/data-user');
    }
    public function edit($id) {
        $data = DB::table('users')->where('id', $id)->get();
        return view('edit_user', compact('data'));
    }
    public function hapus($id) {
        DB::table('users')->where('id', $id)->delete();
        return back();
    }
    public function tambah(Request $request) {
        $pwh = Hash::make($request->password);
        DB::table('users')->insert([
            'name'=>$request->nama_user,
            'email'=>$request->email,
            'password'=>$pwh,
            'role'=>$request->role
        ]);
        return back();
    }
    public function index() {
        $data = DB::table('users')->get();
        return view('data_user', compact('data'));
    }
}
