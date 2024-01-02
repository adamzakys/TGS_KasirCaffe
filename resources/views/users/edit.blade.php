<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Pengguna</h1>

    <form method="post" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
    </form>
@endsection
