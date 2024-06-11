<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function ubah(Request $request, $id) {
        if ($request->kategori == "") {
            DB::table('tbl_barang')->where('id', $id)->update([
                'nama_barang'=>$request->nama_barang,
                'stok'=>$request->stok,
                'harga'=>$request->harga,
            ]);
        } else {
            DB::table('tbl_barang')->where('id', $id)->update([
                'id_kategori'=>$request->kategori,
                'nama_barang'=>$request->nama_barang,
                'stok'=>$request->stok,
                'harga'=>$request->harga,
            ]);
        }
        return redirect('/data-barang');
    }
    public function edit($id) {
        $data = DB::table('tbl_barang')->where('id', $id)->get();
        $kategori = DB::table('tbl_kategori')->get();
        return view('edit_barang', compact('data', 'kategori'));
    }
    public function hapus($id) {
        DB::table('tbl_barang')->where('id', $id)->delete();
        DB::table('tbl_barang_masuk')->where('id_barang', $id)->delete();
        return back();
    }
    public function tambah(Request $request) {
        DB::table('tbl_barang')->insert([
            'id_kategori'=>$request->kategori,
            'nama_barang'=>$request->nama_barang,
            'stok'=>$request->stok,
            'harga'=>$request->harga,
        ]);
        return back();
    }
    public function index() {
        $data = DB::table('tbl_barang')->get();
        $kategori = DB::table('tbl_kategori')->get();
        return view('data_barang', compact('data', 'kategori'));
    }
}
