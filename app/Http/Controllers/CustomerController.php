<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $pelanggan = pelanggan::all();
        return view('pelanggan.index',[
            'title' => 'Pelanggan',
            'pelanggan' => $pelanggan,
        ]);
    }

    public function create()
    {
        return view('pelanggan.create',[
            'title' => 'Tambah Pelanggan',
        ]);
    }

    public function store(request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ], [
            'nama_pelanggan.required' => 'Field nama pelanggan wajib diisi',
            'alamat.required' => 'Field harga wajib diisi',
            'nomor_telepon.required' => 'Field nomor_telepon wajib diisi',
        ]);

        $pelanggan = new pelanggan;
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->nomor_telepon = $request->input('nomor_telepon');
        $pelanggan->save();

        return redirect()->route('pelanggan')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $pelanggan = pelanggan::find($id);
        return view('pelanggan.edit',[
            'title' => 'Edit pelanggan',
            'pelanggan' => $pelanggan,
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
