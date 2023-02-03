<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengadaan - UNIBOOKSTORE</title>
    @vite('resources/css/app.css')
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
    <div class="w-full max-w-md mx-auto my-3">
        <table class="w-full text-left bg-white shadow-md rounded-lg table-collapse">
            <thead>
                <tr class="text-gray-700 font-medium">
                    <th class="py-4 px-6 bg-gray-200 font-semibold">Judul Buku</th>
                    <th class="py-4 px-6 bg-gray-200 font-semibold">Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-gray-700">
                    <td class="py-4 px-6 border-b">{{ $buku->nama_buku }}</td>
                    <td class="py-4 px-6 border-b">{{ $buku->penerbit->nama_penerbit }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
