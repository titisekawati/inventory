<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function ubah(Request $request, $id) {
        DB::table('tbl_kategori')->where('id', $id)->update([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect('/data-kategori');
    }
    public function edit($id) {
        $data = DB::table('tbl_kategori')->where('id', $id)->get();
        return view('ubah_kategori', compact('data'));
    }
    public function hapus($id) {
        DB::table('tbl_kategori')->where('id', $id)->delete();
        return back();
    }
    public function tambah(Request $request) {
        DB::table('tbl_kategori')->insert([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return back();
    }
    public function index() {
        $data = DB::table('tbl_kategori')->get();
        return view('data_kategori', compact('data'));
    }
}
