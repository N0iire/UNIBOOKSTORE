<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index() {
        $buku = Buku::all();
        $penerbit = Penerbit::all();

        return view('admin', compact('buku', 'penerbit'));
    }

    public function add() {
        $penerbit = Penerbit::all();

        return view('buku', compact('penerbit'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_buku' => 'required|max:9',
            'kategori' => 'required|string|min:3',
            'nama_buku' => 'required|string|min:3',
            'harga' => 'required|numeric|min:4',
            'stok' => 'required|numeric',
            'penerbit' => 'required'
        ]);

        $buku = new Buku();

        $buku->id_buku = $validated['id_buku'];
        $buku->kategori = $validated['kategori'];
        $buku->nama_buku = $validated['nama_buku'];
        $buku->harga_buku = $validated['harga'];
        $buku->stok = $validated['stok'];
        $buku->penerbit_id = $validated['penerbit'];

        $buku->save();

        return redirect()->route('admin')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        $penerbit = Penerbit::all();

        return view('edit_buku', compact('buku', 'penerbit'));
    }

    public function update(Request $request, $id) {
        $book = Buku::findOrFail($id);



        $book->update($request->all());

        return redirect()->route('admin')->with('success', 'Buku berhasil diubah!');

    }

    public function delete($id) {
        Buku::destroy($id);

        return redirect()->route('admin')->with('success', 'Buku berhasil dihapus!');

    }

    public function store_p(Request $request) {
        $validated = $request->validate([
            'id_penerbit' => 'required|max:9',
            'nama' => 'required|string|min:3',
            'alamat' => 'required|string|min:4',
            'kota' => 'required|string',
            'telpon' => 'required'
        ]);

        $penerbit = new Penerbit();

        $penerbit->id_penerbit = $validated['id_penerbit'];
        $penerbit->nama_penerbit = $validated['nama'];
        $penerbit->alamat = $validated['alamat'];
        $penerbit->kota = $validated['kota'];
        $penerbit->no_telp = $validated['telpon'];


        $penerbit->save();

        return redirect()->route('admin')->with('success', 'Penerbit berhasil ditambahkan!');
    }

    public function edit_p($id) {
        $penerbit = Penerbit::find($id);

        return view('edit_penerbit', compact('penerbit'));
    }

    public function update_p(Request $request, $id) {
        $penerbit = Penerbit::findOrFail($id);



        $penerbit->update($request->all());

        return redirect()->route('admin')->with('success', 'Penerbit berhasil diubah!');

    }

    public function delete_p($id) {

        Penerbit::destroy($id);

        return redirect()->route('admin')->with('success', 'Penerbit berhasil dihapus!');

    }

    public function pengadaan() {
        $buku = Buku::orderBy('stok', 'asc')->first();

        return view('pengadaan', compact('buku'));
    }
}
