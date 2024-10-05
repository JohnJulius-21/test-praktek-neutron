@extends('layouts.main')

@section('container')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yay!,</strong> {{ session('success') }}.
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}.
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card rounded">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pl-3">
    <h1 class="h4">Daftar Pejualan</h1>
</div>
<hr>
<div class="pt-3 pb-2 pl-3 pr-3">
    <a href="{{ route('tambahPenjualan') }}" class="btn" style="background-color: #5B9BD5; color:white"><i
            style="width:17px;" class="fas fa-fw fa-plus"></i>
        Tambah Penjualan</a>

    <table id="pelanggan" class="display table table-striped mt-2" style="width:100%">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Tanggal Penjualan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $item)
                <tr>
                    <td>{{ $item->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item['tanggal_penjualan'] }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['total_harga'] }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
</div>


@endsection