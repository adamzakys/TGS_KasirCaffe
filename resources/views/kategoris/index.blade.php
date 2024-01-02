<!-- resources/views/kategoris/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategoris.show', $kategori->id_kategori) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('kategoris.edit', $kategori->id_kategori) }}" class="btn btn-warning">Edit</a>
                        <!-- Tambahkan tombol delete dengan form untuk menjaga keamanan -->
                        <form action="{{ route('kategoris.destroy', $kategori->id_kategori) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kategori?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary">Tambah Kategori</a>
@endsection
