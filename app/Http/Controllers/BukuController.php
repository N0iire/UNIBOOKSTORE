<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $buku = Buku::all();

        return view('buku', compact('buku'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $search = Buku::where('id_buku', 'like', '%' . $searchTerm . '%')
            ->orWhere('kategori', 'like', '%' . $searchTerm . '%')
            ->orWhere('nama_buku', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('home', compact('search'));
    }
}
