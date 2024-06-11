<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanBarangMasuk extends Controller
{
    public function cetak() {
        $data = DB::table('tbl_barang')
                ->join('tbl_kategori', 'tbl_barang.id_kategori', '=', 'tbl_kategori.id')
                ->join('tbl_barang_masuk', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                ->get();
        return view('cetak', compact('data'));
    }
    public function index() {
        $data = DB::table('tbl_barang')
                ->join('tbl_kategori', 'tbl_barang.id_kategori', '=', 'tbl_kategori.id')
                ->join('tbl_barang_masuk', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                ->get();
        return view('laporan_barang_masuk', compact('data'));
    }
}
