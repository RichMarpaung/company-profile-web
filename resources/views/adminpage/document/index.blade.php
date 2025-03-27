@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Documents</h1>
        <a href="{{ route('admin.documents.create') }}" class="btn btn-primary mb-3">Create New Document</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Upload Oleh:</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->user->name }}</td>
                    <td><a href="{{ Storage::url($document->path) }}" target="_blank">{{ basename($document->nama) }}</a></td>
                    <td>
                        <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
