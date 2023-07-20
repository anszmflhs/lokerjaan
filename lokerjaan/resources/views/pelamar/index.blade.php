@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap
align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Pelamar</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-10">
        <a href="/pelamar/create" class="btn btn-primary mb-3">Create New Pelamar</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tempat/Tanggal Lahir</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Pass Foto</th>
                    <th scope="col">CV</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
die(json_encode($pelamar));
                @endphp --}}

                @foreach ($pelamars as $pelamar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelamar->users->name }}</td>
                        <td>{{ $pelamar->alamat }}</td>
                        <td>{{ $pelamar->ttl }}</td>
                        <td>{{ $pelamar->pekerjaans->title }}</td>
                        <td>
                            @if ($pelamar->pass_foto)
                                <div style="width: 60px; overflow:hidden">
                                    <img src="{{ url('/') . Storage::url('pass_foto/') . $pelamar->pass_foto }}"
                                        alt="" class="img-fluid">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x400?" width="60px" height="40px"
                                    alt="" class="img-fluid">
                            @endif
                        </td>
                        <td>
                            @if ($pelamar->cv)
                                <div style="width: 60px; overflow:hidden">
                                    <img src="{{ url('/') . Storage::url('cv/') . $pelamar->cv }}" alt=""
                                        class="img-fluid">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x400?" width="60px" height="40px"
                                    alt="" class="img-fluid">
                            @endif
                        </td>
                        <td>
                            <a href="/pelamar/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                            <form action="/pelamar/{{ $pelamar->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
