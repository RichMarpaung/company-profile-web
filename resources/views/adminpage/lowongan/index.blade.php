<!-- filepath: resources/views/adminpage/lowongan/index.blade.php -->
@extends('layouts.master-admin')

@section('content')
    <div class="container mt-5">
        <h1>Lowongan</h1>
        <a href="{{ route('admin.lowongans.create') }}" class="btn btn-primary mb-3">Create New Lowongan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lowongan</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lowongans as $lowongan)
                <tr>
                    <td>{{ $lowongan->id }}</td>
                    <td>{{ $lowongan->nama }}</td>
                    <td>{{ ucfirst($lowongan->status) }}</td>

                    <td>
                        <a href="{{ route('admin.lowongans.edit', $lowongan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.lowongans.destroy', $lowongan->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="#" data-toggle="modal" data-target="#detailModal{{ $lowongan->id }}" class="btn btn-info">Detail</a>
                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal{{ $lowongan->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $lowongan->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $lowongan->id }}">Detail Lowongan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama:</strong> {{ $lowongan->nama }}</p>
                                        <p><strong>Deskripsi:</strong> {{ $lowongan->deskripsi }}</p>
                                        <p><strong>Kualifikasi:</strong> {{ $lowongan->kualifikasi }}</p>
                                        <p><strong>Gaji:</strong> {{ $lowongan->gaji }}</p>
                                        <p><strong>Tanggal Ditutup:</strong> {{ $lowongan->tanggal_ditutup }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($lowongan->status) }}</p>
                                        @if($lowongan->poster)
                                            <p><strong>Poster:</strong></p>
                                            <img src="{{ Storage::url($lowongan->poster) }}" class="img-fluid" alt="Poster">
                                        @else
                                            <p>No Poster</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
