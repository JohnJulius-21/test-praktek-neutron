<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // $pelanggan = pelanggan::all();
        // $produk = produk::all();
        $penjualan = penjualan::with('pelanggan','produk')->get();
        return view('penjualan.index',[
            'title' => 'Penjualan',
            'penjualan' => $penjualan,
        ]);
    }

    public function create()
    {
        $pelanggan = pelanggan::all();
        $produk = produk::all();
        return view('penjualan.create',[
            'title' => 'Tambah Penjualan',
            'produk' => $produk,
            'pelanggan' => $pelanggan,
        ]);
    }

    public function store(request $request)
    {
        // dd($request->all());
        $request->validate([
            'tanggal_penjualan' => 'required',
            'jumlah' => 'required',
        ], [
            'tanggal_penjualan.required' => 'Field tanggal wajib diisi',
            'total_harga.required' => 'Field total_harga wajib diisi',
        ]);

        $penjualan = new penjualan;
        $penjualan->id_produk = $request->input('nama_produk');
        $penjualan->id_pelanggan = $request->input('nama_pelanggan');
        $penjualan->tanggal_penjualan = $request->input('tanggal_penjualan');
        $penjualan->jumlah = $request->input('jumlah');
        $penjualan->total_harga = $request->input('total_harga');
        $penjualan->save();

        return redirect()->route('penjualan')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $pelanggan = pelanggan::find($id);
        return view('pelanggan.edit',compact('pelanggan'),[
            'title' => 'Edit pelanggan',
        ]);
    }

    public function update(request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ], [
            'nama_pelanggan.required' => 'Field nama pelanggan wajib diisi',
            'alamat.required' => 'Field alamat wajib diisi',
            'nomor_telepon.required' => 'Field nomor_telepom wajib diisi',
        ]);

        $pelanggan = pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->nomor_telepon = $request->nomor_telepon;
        $pelanggan->save();

        return redirect()->route('pelanggan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $pelanggan  = pelanggan::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
