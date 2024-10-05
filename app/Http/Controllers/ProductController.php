<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produk = produk::all();
        return view('produk.index',compact('produk'),[
            'title' => 'Produk',
        ]);
    }

    public function create()
    {
        return view('produk.create',[
            'title' => 'Tambah Produk',
        ]);
    }

    public function store(request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ], [
            'nama_produk.required' => 'Field nama produk wajib diisi',
            'harga.required' => 'Field harga wajib diisi',
            'stok.required' => 'Field stok wajib diisi',
        ]);

        $produk = new produk;
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->save();

        return redirect()->route('produk')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $produk = produk::find($id);
        return view('produk.edit',compact('produk'),[
            'title' => 'Edit Produk',
        ]);
    }

    public function update(request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ], [
            'nama_produk.required' => 'Field nama produk wajib diisi',
            'harga.required' => 'Field harga wajib diisi',
            'stok.required' => 'Field stok wajib diisi',
        ]);

        $produk = produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();

        return redirect()->route('produk')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $produk  = produk::find($id);
        $produk->delete();

        return redirect()->route('produk')->with('success', 'Data berhasil dihapus');
    }
}
