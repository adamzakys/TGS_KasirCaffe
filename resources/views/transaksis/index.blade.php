<!-- resources/views/transaksis/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi</h1>
        <a href="{{ route('transaksis.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id_transaksi }}</td>
                        <td>{{ $transaksi->user->nama }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->total_bayar }}</td>
                        <td>
                            <a href="{{ route('transaksis.show', $transaksi->id_transaksi) }}" class="btn btn-info btn-sm">Detail</a>
                            @if (Auth::user()->role == 'Owner')
                                <form action="{{ route('transaksis.destroy', $transaksi->id_transaksi) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @else
                                <button class="btn btn-danger btn-sm">Hapus</button> * Hanya owner
                            @endif
                            
                            <!-- Tambahkan tombol-tombol aksi lainnya jika diperlukan -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
