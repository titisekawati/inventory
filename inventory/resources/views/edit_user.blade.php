@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Kategori</h1>
        @foreach ($data as $i)
            <form action="/ubah-user/{{ $i->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="nama user" class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" value="{{ $i->name }}">
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $i->email }}">
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mt-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option disabled selected>{{ $i->role }}</option>
                        <option value="admin">Admin</option>
                        <option value="gudang">Gudang</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save me-2"></i>Save</button>
                    <a href="/data-user" class="btn btn-danger btn-sm"><i class="fa fa-undo me-2"></i>Batal</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
