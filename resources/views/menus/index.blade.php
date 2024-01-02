@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Menu</h1>
        @if (Auth::user()->role == 'owner')
            <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
        @else
            <button class="btn btn-secondary mb-3">Tambah Menu</button> *Hanya owner
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menus as $menu)
                    <tr>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>Rp.{{ $menu->harga_menu }}</td>
                        <td>{{ $menu->kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('menus.show', $menu->id_menu) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('menus.edit', $menu->id_menu) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection