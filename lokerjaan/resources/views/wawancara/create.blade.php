@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap
align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Wawancara</h1>
    </div>
    <div class="col-lg-8">
        <form method="post"action="/wawancara" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                    name="user_id" required autofocus value="{{ old('user_id') }}">
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai"
                    name="tanggal_mulai" required autofocus value="{{ old('tanggal_mulai') }}">
                @error('tanggal_mulai')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
