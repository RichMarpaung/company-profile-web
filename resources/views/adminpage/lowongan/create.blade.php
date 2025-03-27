<!-- filepath: resources/views/adminpage/lowongan/create.blade.php -->
@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Create Lowongan</h1>
        <form action="{{ route('admin.lowongans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kualifikasi">Kualifikasi:</label>
                <textarea name="kualifikasi" id="kualifikasi" class="form-control @error('kualifikasi') is-invalid @enderror" required></textarea>
                @error('kualifikasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gaji">Gaji:</label>
                <input type="number" name="gaji" id="gaji" class="form-control @error('gaji') is-invalid @enderror" required>
                @error('gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_ditutup">Tanggal Ditutup:</label>
                <input type="date" name="tanggal_ditutup" id="tanggal_ditutup" class="form-control @error('tanggal_ditutup') is-invalid @enderror" required>
                @error('tanggal_ditutup')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="poster">Poster:</label>
                <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror">
                @error('poster')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="dibuka">Dibuka</option>
                    <option value="ditutup">Ditutup</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
