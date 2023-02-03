<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku - UNIBOOKSTORE</title>
    @vite('resources/css/app.css')

</head>
<body>
    {{-- NAV BAR --}}
    <nav class="w-full bg-blue-400">
        <div class="flex items-center justify-between px-6 py-3 md:hidden">
            <div>
                <a href="/" class="text-white font-medium">Home</a>
            </div>
            <div class="block">
                <button id="nav-toggle" class="flex items-center px-3 py-2 text-white border border-white rounded">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="nav-menu" class="hidden md:flex md:items-center md:justify-between px-6 py-3">
            <div>
                <a href="/" class="text-white font-medium">Home</a>
            </div>
            <div class="flex items-center">
                <a href="/admin" class="text-white mr-4 font-medium">Admin</a>
                <a href="/pengadaan" class="text-white font-medium">Pengadaan</a>
            </div>
        </div>
        <div id="nav-popup" class="hidden absolute bg-white rounded shadow-md p-6 right-1">
            <a href="#" class="block text-black font-medium mb-4">Home</a>
            <a href="#" class="block text-black font-medium mb-4">Admin</a>
            <a href="#" class="block text-black font-medium">Pengadaan</a>
        </div>
    </nav>

    {{-- FORM --}}
    <div class="flex mt-3 justify-center">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg py-8 px-8">
            <h2 class="text-lg font-medium mb-4 text-center">Form Pendaftaran Buku</h2>
            <form action="/buku/update/{{ $buku->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="id">ID</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="id" name="id_buku"
                        value="{{ $buku->id_buku }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="kategori">Kategori</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="kategori" name="kategori"
                        value="{{ $buku->kategori }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="namaBuku">Nama Buku</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="nama_buku"
                        name="nama_buku" value="{{ $buku->nama_buku }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="harga">Harga</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="number" id="harga"
                        name="harga_buku" value="{{ $buku->harga_buku }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="stok">Stok</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="number" id="stok"
                        name="stok" value="{{ $buku->stok }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="penerbit">
                        Penerbit
                    </label>
                    <select class="w-full border border-gray-400 p-2 rounded-lg" id="penerbit" name="penerbit_id" required>
                        <option value="">-- Pilih Penerbit --</option>
                        @foreach ($penerbit as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_penerbit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-center">
                    <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
