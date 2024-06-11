<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_barang')->join('tbl_kategori', 'tbl_barang.id_kategori', '=', 'tbl_kategori.id')->get();
        $jmlbrgcount = DB::table('tbl_barang')->count();
        $usercount = DB::table('users')->count();
        $kategoricount = DB::table('tbl_kategori')->count();
        return view('home', compact('data', 'jmlbrgcount', 'usercount', 'kategoricount'));
    }
}
