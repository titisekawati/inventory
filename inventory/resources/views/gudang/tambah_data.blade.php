@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Barang Masuk</h1>
        <div class="card mt-3">
            <div class="card-header">
                Tambah Data Barang Masuk
            </div>
            <div class="card-body">
                <form action="/insert-data-barang" method="POST">
                    @csrf
                    <input type="hidden" name="idBrg" id="idBrg">
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <label for="nama barang" class="form-label">Nama Barang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-search me-2"></i><b>Cari</b></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <button class="btn btn-primary" type="button">Rp.</button>
                                    <input type="text" class="form-control" name="harga" id="harga" disabled>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="stok barang" class="form-label">Stok Barang</label>
                                <div class="input-group">
                                    <input type="text" disabled class="form-control" name="stok_barang" id="stok_barang">
                                    <button class="btn btn-primary" type="button">Pcs</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="qty" class="form-label">Qty Masuk</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qty" id="qty"
                                        placeholder="Qty Masuk" onchange="shTtl()">
                                    <button class="btn btn-primary" type="button">Pcs</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-save me-2"></i>Simpan</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-undo me-2"></i>Kembali</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <label for="nama barang" class="form-label">No Transaksi</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" disabled
                                    placeholder="Terisi Otomatis">
                            </div>
                            <div class="mt-3">
                                <label for="tanggal masuk" class="form-label">Tgl Masuk</label>
                                <input type="date" name="tgl" id="tgl" class="form-control">
                            </div>
                            <div class="mt-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" name="total" id="total" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="tbBrg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k => $i)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $i->nama_barang }}</td>
                                    <td>{{ $i->stok }}</td>
                                    <td>{{ $i->harga }}</td>
                                    <td>
                                        <button data-bs-dismiss="modal" class="btn btn-primary btn-sm" data-id="{{ $i->id }}"
                                            data-nama-barang="{{ $i->nama_barang }}" data-stok="{{ $i->stok }}"
                                            data-harga="{{ $i->harga }}" onclick="pilih_item(this)">Pilih</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-undo me-2"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function pilih_item(obj) {
            document.getElementById('nama_barang').value = obj.getAttribute('data-nama-barang')
            document.getElementById('harga').value = obj.getAttribute('data-harga')
            document.getElementById('stok_barang').value = obj.getAttribute('data-stok')
            document.getElementById('idBrg').value = obj.getAttribute('data-id')
        }
        function shTtl() {
            let harga = document.getElementById('harga').value
            let qtyM = document.getElementById('qty').value
            document.getElementById('total').value = harga * qtyM
        }
    </script>
@endsection
