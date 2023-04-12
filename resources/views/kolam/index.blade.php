@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}.
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kolam.create') }}" class="btn btn-primary m-b-md">Tambah Kolam</a>
                    <h5 class="card-title">Data Kolam</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Kolam</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kolams as $kolam)
                                <tr>
                                    <td>{{ $kolam->id }}</td>
                                    <td>
                                        <a href="{{ route('kolam.show', $kolam->id) }}" style="color: #7d8581;">{{ $kolam->nomor_kolam }}</a>
                                    </td>
                                    <td>{{ $kolam->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('kolam.show', $kolam->id) }}">Lihat</a>
                                            <a class="dropdown-item" href="{{ route('kolam.edit', $kolam->id) }}">Edit</a>

                                            <form id="input" action="{{ route('kolam.destroy', $kolam->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus Kolam ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    style="border: none; background-color: white; color: red;">Hapus</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
