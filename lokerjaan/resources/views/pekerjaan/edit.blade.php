@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/pekerjaan/edit" class="mb-5" enctype="multipart/form-data">
            @method('PUT') {{-- Tambahkan metode PUT di sini --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Pekerjaan</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                    required autofocus value="{{ old('user_id') }}">
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
    </div>
@endsection
