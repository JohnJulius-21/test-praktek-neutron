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
            <h1 class="h4">Daftar Pelanggan</h1>
        </div>
        <hr>
        <div class="pt-3 pb-2 pl-3 pr-3">
            <a href="{{ route('tambahPelanggan') }}" class="btn" style="background-color: #5B9BD5; color:white"><i
                    style="width:17px;" class="fas fa-fw fa-plus"></i>
                Tambah Pelanggan</a>

            <table id="datatable" class="display table table-striped mt-2" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $item)
                        <tr>
                            <td>{{ $item['nama_pelanggan'] }}</td>
                            <td>{{ $item['alamat'] }}</td>
                            <td>{{ $item['nomor_telepon'] }}</td>
                            <td>
                                <a class="btn btn-warning mb-2" href="{{ route('editPelanggan', $item->id_pelanggan) }}">Edit</a>
                                <form action="{{ route('hapusPelanggan', $item->id_pelanggan) }}" method="POST">
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
