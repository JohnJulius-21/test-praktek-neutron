@extends('layouts.main')

@section('container')
    <div>
        <nav style=" --bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #f8f9fc;">
                <li class="breadcrumb-item active"><a href="{{ route('pelanggan') }}" class="text-decoration-none"
                        style="color: #6c757d;"><i class="fas fa-fw fa-paste"></i>Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
            </ol>
        </nav>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card rounded" style="max-height: 750px; overflow-y: auto;">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pl-3">
            <h1 class="h4"><i class="fas fa-fw fa-arrow-left" style="size: 10px"></i> Tambah Pelanggan</h1>
            <hr>
        </div>
        <hr>
        <div class="px-3 mb-3">
            <span class="mb-2" style="color: #5B9BD5"><strong>Informasi Pelanggan</strong></span>

            <form action="{{ route('simpanPelanggan') }}" method="POST">
                @csrf
                <div class="card rounded px-4 mb-3 py-3 mt-3">
                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" placeholder="Nama pelanggan" name="nama_pelanggan">
                        @error('nama_pelanggan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan alamat" name="alamat">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor telepon</label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Masukan nomor telepon" name="nomor_telepon">
                        @error('nomor_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary" style="color: white; background: #5B9BD5;">
                        Tambahkan Pelanggan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
