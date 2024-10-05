@extends('layouts.main')

@section('container')
    <div>
        <nav style=" --bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #f8f9fc;">
                <li class="breadcrumb-item active"><a href="{{ route('penjualan') }}" class="text-decoration-none"
                        style="color: #6c757d;"><i class="fas fa-fw fa-paste"></i>Penjualan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Penjualan Baru</li>
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
            <h1 class="h4"><i class="fas fa-fw fa-arrow-left" style="size: 10px"></i> Buat Produk Baru</h1>
            <hr>
        </div>
        <hr>
        <div class="px-3 mb-3">
            <span class="mb-2" style="color: #5B9BD5"><strong>Informasi Penjualan</strong></span>

            <form action="{{ route('simpanPenjualan') }}" method="POST">
                @csrf
                <div class="card rounded px-4 mb-3 py-3 mt-3">
                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label">Nama pelanggan</label>
                        <select name="nama_pelanggan" class="form-select">
                            <option value="" disabled selected>Pilih Pelanggan</option>
                            @foreach ($pelanggan as $item)
                                <option value="{{ $item->id_pelanggan }}">{{ $item->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <select name="nama_produk" id="nama_produk" class="form-select">
                            <option value="" disabled selected>Pilih Produk</option>
                            @foreach ($produk as $item)
                                <!-- Adding data attribute for the price -->
                                <option value="{{ $item->id_produk }}" data-harga="{{ $item->harga }}">{{ $item->nama_produk }}</option>
                            @endforeach
                        </select>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" class="form-control @error('tanggal_penjualan') is-invalid @enderror"
                            placeholder="Masukan tanggal_penjualan" name="tanggal_penjualan">
                        @error('tanggal_penjualan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                            placeholder="Masukan jumlah" name="jumlah" id="jumlah">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="text" class="form-control @error('total_harga') is-invalid @enderror"
                            placeholder="Masukan total harga" name="total_harga" id="total_harga" readonly>
                        @error('total_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary" style="color: white; background: #5B9BD5;">
                        Tambahkan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(number);
            }

            function calculateTotal() {
                let harga = parseFloat($('#nama_produk option:selected').data('harga')) || 0;
                let jumlah = parseFloat($('#jumlah').val()) || 0;
                let total = harga * jumlah;
                
                $('#total_harga').val(formatRupiah(total));
            }

            $('#nama_produk, #jumlah').on('change keyup', function () {
                calculateTotal();
            });
        });
    </script>
@endsection
