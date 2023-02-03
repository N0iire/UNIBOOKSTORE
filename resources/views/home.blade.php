<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/home.css')
    @vite('resources/scss/app.scss')
    <title>UNIBOOKSTORE</title>
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

    {{-- CONTENT --}}

    {{-- First Section --}}
    <div class="hero1 bg-cover bg-center">
        <div class="container h-full">
            <div>
                <div class="
                relative max-w-[350px] z-20 top-[305px] left-[123px] bg-[#ff8258] py-2 px-3
                xl:top-[100px] xl:left-[800px]
                ">
                    <h1 class="text-3xl text-white text-center font-medium">Discover New World!</h1>
                </div>
                <div class="
                relative max-w-[350px] z-10 bg-white top-[258px] left-[128px]
                xl:top-[54px] xl:left-[805px]
                ">
                    <h1 class="text-3xl text-center font-medium text-white py-2 px-3">Discover New World!</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Second Section --}}
    <div class="my-5 mx-2 min-h-[700px]">
        <div class="
        relative z-20 max-w-[300px] bg-black py-2 px-3">
            <h1 class="text-center text-xl text-white"> Our list for your adventure</h1>
        </div>
        <div class="relative z-10 max-w-[300px] right-[-4px] top-[-38px] bg-[#ff8258] py-2 px-3"">
            <h1 class="text-center text-xl text-[#ff8258]"> Our list for your adventure</h1>
        </div>
        {{-- SEARCH INPUT --}}
        <div class="flex justify-end mx-3 my-4">
            <form action="buku/cari" method="POST">
                @csrf
                <input type="text" class="
                bg-transparent
                focus:outline-none
                focus:shadow-outline
                border-b
                border-blue-500
                text-base
                placeholder-gray-500" placeholder="Cari buku disini..."
                name="search"
                >
                <input type="submit" value="Mulai Mencari" class="bg-[#ff8258] px-1 py-1 text-white rounded-md">
            </form>
        </div>

        {{-- GRID --}}
        @if (empty($buku) && empty($search))
            <p class="text-center my-5">Data buku tidak ditemukan.</p>
        @elseif (!empty($search))
        <div class="top-0 right-0 left-0 z-50 p-2">
            <div class="bg-green-500 text-white text-center p-3 rounded-lg">
                <p>Data berhasil dicari!</p>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($search as $item)
            {{-- BOOK CARD --}}
                <div class="col-span-1 bg-gray-100 shadow-sm px-2 py-2 rounded-md my-3 mx-3">
                    <div class="py-4 inline-block">
                        <img src="{{ URL('img/4300_7_07.jpg') }}" class="rounded-md" alt="">
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
                </div>
            @endforeach

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
                </div>
            @endforeach

        </div>

        @endif

    </div>
</body>

<script>
    const toggle = document.querySelector('#nav-toggle');
    const menu = document.querySelector('#nav-menu');
    const popup = document.querySelector('#nav-popup');

    toggle.addEventListener('click', function() {
    menu.classList.add('hidden');
    popup.classList.toggle('hidden');
    });
</script>
</html>
