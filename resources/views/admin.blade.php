<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - UNIBOOKSTORE</title>
    @vite('resources/css/app.css')
    @vite('resources/scss/app.scss')
</head>
<body>
    {{-- NAV BAR --}}
    <nav class="w-full bg-blue-400">
        <div class="flex items-center justify-between px-6 py-3 md:hidden">
            <div>
                <a href="#" class="text-white font-medium">Home</a>
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
    @if (!empty($success))
        <div class="bg-green-500 text-white text-center p-3 rounded-lg">
            <p>Data buku kosong!</p>
        </div>
    @endif

    @if (!empty($success))
        <div class="bg-green-500 text-white text-center p-3 rounded-lg">
            <p>{{ $success }}!</p>
        </div>
    @endif

    {{-- CONTENT --}}

    {{-- First Section --}}
    <div class="my-5 mx-2 min-h-[700px]">
        <div class="
        relative z-20 max-w-[300px] bg-black py-2 px-3">
            <h1 class="text-center text-xl text-white"> Manajemen Buku & Penerbit</h1>
        </div>
        <div class="relative z-10 max-w-[300px] right-[-4px] top-[-38px] bg-[#ff8258] py-2 px-3"">
            <h1 class="text-center text-xl text-[#ff8258]"> Our list for your adventure</h1>
        </div>
        {{-- Tambah Buku Button --}}
        <div class="flex justify-end mx-3 my-4">
            <button id="tambahBuku" class="bg-blue-500 text-white rounded-full py-2 px-4 hover:bg-blue-600" type="button">
                <i class="fas fa-plus mr-2"></i>
                Tambah Buku
            </button>
        </div>

        {{-- GRID --}}
        @if (empty($buku))
            <div class="bg-red-500 text-white text-center p-3 rounded-lg">
                <p>Data buku kosong!</p>
            </div>
        @elseif (empty($penerbit))
            <div class="bg-red-500 text-white text-center p-3 rounded-lg">
                <p>Data penerbit dicari!</p>
            </div>
        @else

        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($buku as $item)
                {{-- BOOK CARD --}}
            <div class="col-span-1 bg-gray-100 shadow-sm px-2 py-2 rounded-md my-3 mx-3">
                <div class="py-4 inline-block">
                    <img src="img/4300_7_07.jpg" class="rounded-md" alt="">
                </div>
                <div class="border inline-block">
                    <table class="table-auto text-center w-full">
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                ID
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->id_buku }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Kategori
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->kategori }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Nama Buku
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->nama_buku }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Harga
                            </td>
                            <td class="py-1 px-1">
                                Rp. {{ $item->harga_buku }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Stok
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->stok }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Penerbit
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->penerbit->nama_penerbit }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="flex justify-between mt-3">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-md">
                        <a href="admin/edit/buku/{{ $item->id }}">Edit</a>
                    </button>
                    <form action="/buku/delete/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="hapus" class="bg-red-500 text-white py-2 px-2 rounded-md">
                    </form>

                    {{-- <button class="bg-red-500 text-white py-2 px-4 rounded-md">
                        <a href="/buku/hapus/{{ $item->id }}"></a> Hapus
                    </button> --}}
                </div>
            </div>
            @endforeach
        </div>

    </div>

        {{-- Second Section --}}
        {{-- Tambah Penerbit Button --}}
        <div class="flex justify-end mx-3 my-4">
            <button id="tambahPenerbit" class="bg-blue-500 text-white rounded-full py-2 px-4 hover:bg-blue-600">
                <i class="fas fa-plus mr-2"></i>
                Tambah Penerbit
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 mx-3 my-3 px-1 py-2">
            @foreach ($penerbit as $item)
                {{-- BOOK CARD --}}
            <div class="col-span-1 bg-gray-100 shadow-sm px-2 py-2 rounded-md my-3 mx-3">
                <div class="py-4 inline-block">
                    <img src="img/5836.jpg" class="rounded-md" alt="">
                </div>
                <div class="border inline-block">
                    <table class="table-auto text-center w-full">
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                ID
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->id_penerbit }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Penerbit
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->nama_penerbit }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Alamat
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Kota
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->kota }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-300 py-1 px-1">
                                Telepon
                            </td>
                            <td class="py-1 px-1">
                                {{ $item->no_telp }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="flex justify-between mt-3">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-md">
                        <a href="admin/edit/penerbit/{{ $item->id }}"> Edit </a>
                    </button>
                    <form action="/penerbit/delete/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="hapus" class="bg-red-500 text-white py-2 px-2 rounded-md">
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @endif

</div>

</body>
</html>
<script>
// Get the button that opens tambah page
var btn = document.getElementById("tambahBuku");
var btn2 = document.getElementById("tambahPenerbit");


// When the user clicks the button, open the page
btn.onclick = function() {
    window.location.href = "http://127.0.0.1:8000/admin/buku/"
}

// When the user clicks the button, open the page
btn2.onclick = function() {
    window.location.href = "http://127.0.0.1:8000/admin/penerbit/"
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>
