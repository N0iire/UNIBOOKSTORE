<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $buku = Buku::all();
        $penerbit = Penerbit::all();

        return view('home', compact('buku', 'penerbit'));
    }
}
