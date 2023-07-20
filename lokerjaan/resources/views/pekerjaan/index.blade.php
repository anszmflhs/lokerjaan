@extends('layouts.main')

@section('containers')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap
align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Pekerjaan</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-6">
        <a href="/pekerjaan/create" class="btn btn-primary mb-3">Create New Pekerjaan</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pekerjaan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaans as $pekerjaan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pekerjaan->title }}</td>
                        <td>

                            <a href="/pekerjaan/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                            <form action="/pekerjaan/{{ $pekerjaan->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
