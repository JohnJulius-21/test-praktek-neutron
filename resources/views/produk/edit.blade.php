@extends('layouts.main')

@section('container')
    <div>
        <nav style=" --bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #f8f9fc;">
                <li class="breadcrumb-item active"><a href="{{ route('produk') }}" class="text-decoration-none"
                        style="color: #6c757d;"><i class="fas fa-fw fa-paste"></i>Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Informasi Produk</li>
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
            <h1 class="h4"><i class="fas fa-fw fa-arrow-left" style="size: 10px"></i>Ubah Informasi Produk</h1>
            <hr>
        </div>
        <hr>
        <div class="px-3 mb-3">
            <span class="mb-2" style="color: #5B9BD5"><strong>Informasi Produk</strong></span>

            <form action="{{ route('updateProduk', $produk->id_produk) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card rounded px-4 mb-3 py-3 mt-3">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama Produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan Harga" name="harga" value="{{ old('harga', $produk->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukan Stok" name="stok" value="{{ old('stok', $produk->stok) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary" style="color: white; background: #5B9BD5;">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
