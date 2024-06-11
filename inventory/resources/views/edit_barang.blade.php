@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Kategori</h1>
        @foreach ($data as $i)
            <form action="/ubah-barang/{{ $i->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="nama barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $i->nama_barang }}">
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
                    <input type="number" class="form-control" name="stok" id="stok" value="{{ $i->stok }}">
                </div>
                <div class="mt-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="{{ $i->harga }}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save me-2"></i>Save</button>
                    <a href="/data-barang" class="btn btn-danger btn-sm"><i class="fa fa-undo me-2"></i>Batal</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
