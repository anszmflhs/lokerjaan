@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap
align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Pelamar</h1>
    </div>
    <div class="col-lg-8">
        <form method="post"action="/pelamar" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
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
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    required autofocus value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ttl" class="form-label">TTL</label>
                <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl"
                    required autofocus value="{{ old('ttl') }}">
                @error('ttl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pekerjaan_id">Pekerjaan:</label>
                <select class="form-control @error('pekerjaan_id') is-invalid @enderror" name="pekerjaan_id"
                    id="pekerjaan_id">
                    @foreach ($pekerjaan as $pk)
                        <option value="{{ $pk->id}}">{{ ucwords($pk->title) }}</option>
                    @endforeach
                </select>
                @error('job_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pass_foto" class="form-label">Pas Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" @error('pass_foto') is-invalid @enderror type="file" id="pass_foto"
                    name="pass_foto" onchange="previewImage()">
                @error('pass_foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">Foto CV</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" @error('cv') is-invalid @enderror type="file" id="cv"
                    name="cv" onchange="previewImage()">
                @error('cv')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        document.addEventListener("trix-file-accept", function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
