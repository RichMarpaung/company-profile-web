<!-- filepath: resources/views/adminpage/services/create.blade.php -->
@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Create Service</h1>
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
