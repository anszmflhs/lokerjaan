@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap
align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Wawancara</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-8">
        <a href="/wawancara/create" class="btn btn-primary mb-3">Create New Wawancara</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pelamar</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wawancaras as $wawancara)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $wawancara->users->name }}</td>
                    <td>{{ $wawancara->tanggal_mulai }}</td>
                    <td>
                        <a href="/wawancara/edit" class="btn btn-warning"><span
                                data-feather="edit"></span></a>
                        <form action="/wawancara/{{ $wawancara->id }}" method="post" class="d-inline">
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
