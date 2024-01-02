<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-body gradient-1">
          <div class="card-header bg-gradient-primary text-white">
            <h2 class="text-white mb-0">Detail User</h2>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Atribut</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Nama</th>
                  <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Role</th>
                  <td>{{ $user->role }}</td>
                </tr>
                <tr>
                  <th scope="row">Dibuat pada</th>
                  <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
                <tr>
                  <th scope="row">Terakhir diperbarui pada</th>
                  <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning"><strong>Edit</strong></a>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary ml-2"><strong>Kembali</strong></a>
        </div>
      </div>
    </div>
  </div>
  
@endsection
