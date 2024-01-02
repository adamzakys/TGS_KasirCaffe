@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('menus.update', $menu->id_menu) }}" >
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" required>
            </div>
            <div class="form-group">
                <label for="harga_menu">Harga:</label>
                <input type="text" name="harga_menu" class="form-control" value="{{ $menu->harga_menu }}" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori:</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection