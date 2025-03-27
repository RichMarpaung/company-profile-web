<!-- filepath: resources/views/adminpage/document/create.blade.php -->
@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Create Document</h1>
        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="file">File:</label>
                <input type="file" name="path" id="path" class="form-control @error('path') is-invalid @enderror" required>
                @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
