<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBarangMasuk extends Controller
{
    public function insert(Request $request) {
        $idBrg = $request->idBrg;
        $notr = "TR".Date('His');
        $tdBrg = DB::table('tbl_barang')->where('id', $idBrg)->get();
        foreach ($tdBrg as $key => $value) {
            DB::table('tbl_barang_masuk')->insert([
                'id_barang'=>$request->idBrg,
                'no_transaksi'=>$notr,
                'tanggal'=>$request->tgl,
                'qty'=>$request->qty,
                'total'=>$value->harga*$request->qty
            ]);
            $newStok = $value->stok+$request->qty;
            DB::table('tbl_barang')->where('id', $idBrg)->update([
                'stok'=>$newStok,
            ]);
        }
        return redirect('/data-barang-masuk');
    }
    public function tambah() {
        $data = DB::table('tbl_barang')->get();
        return view('gudang.tambah_data', compact('data'));
    }
    public function index() {
        $data = DB::table('tbl_barang')
                ->join('tbl_kategori', 'tbl_barang.id_kategori', '=', 'tbl_kategori.id')
                ->join('tbl_barang_masuk', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                ->get();
        return view('gudang.data_barang_masuk', compact('data'));
    }
}
