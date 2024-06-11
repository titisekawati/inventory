@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Kategori</h1>
        @foreach ($data as $i)
            <form action="/ubah-kategori/{{ $i->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="nama_kategori" class="form_label">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
                        value="{{ $i->nama_kategori }}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save me-2"></i>Save</button>
                    <a href="/data-kategori" class="btn btn-danger btn-sm"><i class="fa fa-undo me-2"></i>Batal</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
