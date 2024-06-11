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
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $k => $i)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->role }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/edit-user/{{ $i->id }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil pe-2"></i>Ubah</a>
                                        <a href="/hapus-user/{{ $i->id }}" class="btn btn-danger btn-sm"><i
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
            <form action="/tambah-user" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mt-3">
                            <label for="nama user" class="form-label">Nama User</label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user">
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mt-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option disabled selected>--</option>
                                <option value="admin">Admin</option>
                                <option value="gudang">Gudang</option>
                            </select>
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
