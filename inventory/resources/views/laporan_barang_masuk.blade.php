@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Barang Masuk</h1>
        <div class="mt-3 card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <p class="fw-bold">Data Barang Masuk</p>
                    <div>
                        <a href="/cetak" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fa fa-print me-2"></i> Cetak Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="tbKategori">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Barang</th>
                            <th>Kategori</th>
                            <th>Tgl</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $k => $i)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $i->no_transaksi }}</td>
                                <td>{{ $i->nama_barang }}</td>
                                <td>{{ $i->nama_kategori }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->qty }}</td>
                                <td>{{ $i->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
