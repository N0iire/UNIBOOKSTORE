<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Penerbit - UNIBOOKSTORE</title>
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

    {{-- FORM --}}
    <div class="flex mt-3 justify-center">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg py-8 px-8">
            <h2 class="text-lg font-medium mb-4 text-center">Form Pendaftaran Penerbit</h2>
            <form action="tambah/" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="id">ID</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="id" name="id_penerbit" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="nama">Nama</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="nama" name="nama"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="alamat">Alamat</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="alamat"
                        name="alamat" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="kota">Kota</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="kota"
                        name="kota" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="telpon">No Telepon</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="telpon"
                        name="telpon" required>
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
