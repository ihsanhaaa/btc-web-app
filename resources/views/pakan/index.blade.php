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
                    <a href="{{ route('pakan.create') }}" class="btn btn-primary m-b-md">Tambah Data</a>
                    <h5 class="card-title">Data Pakan</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakans as $pakan)
                                <tr>
                                    <td>{{ $pakan->id }}</td>
                                    <td>{{ $pakan->uraian }}</td>
                                    <td>{{ $pakan->pemasukan }}</td>
                                    <td>{{ $pakan->pengeluaran }}</td>
                                    <td>{{ $pakan->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('pakan.show', $pakan->id) }}">Lihat</a>
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
