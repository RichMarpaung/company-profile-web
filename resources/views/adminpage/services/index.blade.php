@extends('layouts.master-admin')

@section('content')
<div class="container">
    <h1 class="my-4">Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Add Service</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->nama }}</td>
                <td>{{ $service->deskripsi }}</td>
                <td>{{ $service->harga }}</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
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
