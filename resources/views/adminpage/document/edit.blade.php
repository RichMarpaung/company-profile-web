<!-- filepath: resources/views/adminpage/document/edit.blade.php -->
@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Edit Document</h1>
        <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $document->nama }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" name="path" id="path" class="form-control @error('path') is-invalid @enderror">
                @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small>Current file: <a href="{{ Storage::url($document->path) }}" target="_blank">{{ basename($document->nama) }}</a></small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
