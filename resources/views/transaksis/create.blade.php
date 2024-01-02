<!-- resources/views/transaksis/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('transaksis.store') }}">
            @csrf

            <!-- Isian form sesuai dengan atribut pada model Transaksi -->
            <div class="form-group">
                <label for="id_user">Kasir:</label>
                <select class="form-control" id="id_user" name="id_user">
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->nama }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <!-- Menambahkan isian untuk menu yang dibeli -->
            <div class="form-group">
                <label for="menus">Menu:</label>
                <div id="menu-container">
                    <!-- Isian menu akan ditambahkan melalui JavaScript -->
                </div>
                <button type="button" class="btn btn-primary" onclick="addMenu()">Tambah Menu</button>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        // Fungsi untuk menambahkan isian menu secara dinamis
        function addMenu() {
            const menuContainer = document.getElementById('menu-container');
            const menuCount = menuContainer.querySelectorAll('.form-row').length;

            // Clone template menu
            const menuTemplate = document.getElementById('menu-template');
            const newMenu = menuTemplate.cloneNode(true);
            newMenu.removeAttribute('id');
            newMenu.removeAttribute('hidden');

            // Ubah nama elemen form yang baru
            newMenu.querySelector('select').name = `menus[${menuCount}][id_menu]`;
            newMenu.querySelector('input').name = `menus[${menuCount}][jumlah_pesanan]`;

            // Tambahkan menu ke container
            menuContainer.appendChild(newMenu);
        }

    </script>

    <!-- Template menu yang akan di-clone -->
    <div id="menu-template" hidden>
        <div class="form-row mb-2">
            <div class="col">
                <select name="menus[0][id_menu]" class="form-control" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id_menu }}">{{ $menu->nama_menu }} - {{ $menu->harga_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" name="menus[0][jumlah_pesanan]" class="form-control" placeholder="Jumlah Pesanan" required>
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger" onclick="removeMenu(this)">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menghapus isian menu
        function removeMenu(button) {
            const menuContainer = document.getElementById('menu-container');
            const menuRow = button.closest('.form-row');
            menuContainer.removeChild(menuRow);
        }
    </script>
@endsection
