@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/wawancara/edit" class="mb-5" enctype="multipart/form-data">
            @method('PUT') {{-- Tambahkan metode PUT di sini --}}
            @csrf
            <div class="mb-3">
                <label for="user_id">User:</label>
                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                    id="user_id">
                    @foreach ($user as $users)
                        <option value="{{ $users->id}}">{{ ucwords($users->name) }}</option>
                    @endforeach
                </select>
                @error('job_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai"
                    required autofocus value="{{ old('tanggal_mulai') }}">
                @error('tanggal_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
    </div>
@endsection
