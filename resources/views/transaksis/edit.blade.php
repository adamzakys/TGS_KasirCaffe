@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Transaksi</h1>
                @section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Edit Transaksi</h1>
                
                            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                                @csrf
                
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $transaksi->tanggal }}" required>
                                </div>
                
                                <div class="form-group">
                                    <label for="id_user">ID Pengguna</label>
                                    <input type="number" class="form-control" id="id_user" name="id_user" value="{{ $transaksi->id_user }}" required>
                                </div>
                
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <select class="form-control" id="menu" name="menu">
                                        @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $menu->id == $transaksi->transaksiDetails[0]->id_menu ? 'selected' : '' }}>{{ $menu->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                
                                <div class="form-group">
                                    <label for="jumlah_pesanan">Jumlah Pesanan</label>
                                    <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="{{ $transaksi->transaksiDetails[0]->jumlah_pesanan }}" required>
                                </div>
                
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection
                