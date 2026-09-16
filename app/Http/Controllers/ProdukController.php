<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function tampilkan($id)
    {
        $produk = Produk::find($id);
        return view('produk', ['produk' => $produk]);
    }

    public function formTambah()
    {
        return view('tambah-produk');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'harga' => 'required|numeric|min:0',
        ]);

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect('/produk/tambah')->with('sukses', 'Produk berhasil ditambahkan!');
    }
}