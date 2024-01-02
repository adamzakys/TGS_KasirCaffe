<!-- resources/views/transaksis/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Transaksi</h1>

        <div class="mb-3">
            <strong>Kasir:</strong> {{ $transaksi->user->nama }} {{-- Sesuaikan dengan relasi pada model Transaksi --}}
        </div>
        <div class="mb-3">
            <strong>Tanggal:</strong> {{ $transaksi->tanggal }}
        </div>
        <div class="mb-3">
            <strong>Total Bayar:</strong> {{ $transaksi->total_bayar }}
        </div>

        <h2>Menu yang Dibeli:</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->transaksiDetails as $detail)
                    <tr>
                        <td>{{ $detail->menu->nama_menu }}</td>
                        <td>{{ $detail->jumlah_pesanan }}</td>
                        <td>{{ $detail->harga }}</td>
                        <td>{{ $detail->sub_total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-start">
            <a href="{{ route('transaksis.index') }}" class="btn btn-outline-secondary ml-2"><strong>Kembali</strong></a>
        </div>
    </div>
@endsection
