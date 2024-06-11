@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data User</h1>
        <div class="mt-3 card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <p class="fw-bold">Data User</p>
                    <div>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">+
                            Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="tbKategori">
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
                                    <div class="d-flex gap-2">
                                        <a href="/edit-barang/{{ $i->id }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil pe-2"></i>Ubah</a>
                                        <a href="/hapus-barang/{{ $i->id }}" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash pe-2"></i>Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/tambah-barang" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mt-3">
                            <label for="nama barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                        </div>
                        <div class="mt-3">
                            <label for="kategori" class="form-label">Jenis Barang</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option disabled selected>--</option>
                                @foreach ($kategori as $kt)
                                    <option value="{{ $kt->id }}">{{ $kt->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="stok" class="form-label">Stok Barang</label>
                            <input type="number" class="form-control" name="stok" id="stok">
                        </div>
                        <div class="mt-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save me-2"></i>Save</button>
                        <button type="reset" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                                class="fa fa-undo me-2"></i>Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
