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
            <h1 class="h4">Daftar Produk</h1>
        </div>
        <hr>
        <div class="pt-3 pb-2 pl-3 pr-3">
            <a href="{{ route('tambahProduk') }}" class="btn" style="background-color: #5B9BD5; color:white"><i
                    style="width:17px;" class="fas fa-fw fa-plus"></i>
                Tambah Produk</a>

            <table id="produk" class="display table table-striped mt-2" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $item['nama_produk'] }}</td>
                            <td>{{ $item['harga'] }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>
                                <a class="btn btn-warning mb-2" href="{{ route('editProduk', $item->id_produk) }}">Edit</a>
                                <form action="{{ route('hapusProduk', $item->id_produk) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection
