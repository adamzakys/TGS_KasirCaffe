@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Menu</h2>
    <div class="card mb-3 gradient-2">
        <div class="card-header">
        <h3 class="text-white ">{{ $menu->nama_menu }}</h3>
        <hr/>
        </div>
        <div class="card-body">
        <p class="card-text">Harga: Rp {{ number_format($menu->harga_menu, 2) }}</p>
        <p class="card-text">Kategori: {{ $menu->kategori->nama_kategori }}</p>
        <p class="card-text">Dibuat pada: {{ $menu->created_at->format('d-m-Y H:i:s') }}</p>
        <p class="card-text">Di Update pada: {{ $menu->updated_at->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</div>
@endsection