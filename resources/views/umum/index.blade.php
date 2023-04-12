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
                    <a href="{{ route('pengeluaran-umum.create') }}" class="btn btn-primary m-b-md">Tambah Data</a>
                    <a href="{{ url('/daily_spending/export') }}" class="btn btn-primary m-b-md">Download Data</a>
                    <h5 class="card-title">Data umum</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Tanggal Dibuat</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPengeluaran = 0;
                            @endphp
                            @foreach ($umums as $umum)
                            @php
                                $totalPengeluaran = $umum->sum('harga');
                            @endphp
                                <tr>
                                    <td>{{ $umum->id }}</td>
                                    <td>
                                        <a href="{{ route('pengeluaran-umum.show', $umum->id) }}" style="color: #7d8581;">{{ $umum->uraian }}</a>
                                    </td>
                                    <td>{{ $umum->created_at->format('M d, Y') }}</td>
                                    <td>Rp. {{ number_format((float) $umum->harga) }}</td>
                                    <td>
                                        @if ($umum->image == null)
                                            <p>Tidak ada foto</p>
                                        @else
                                            <a href="{{ asset('image/' . $umum->image) }}">Lihat Foto</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('pengeluaran-umum.show', $umum->id) }}">Lihat</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td><strong>Total Pengeluaran: Rp. {{ number_format((float) $totalPengeluaran) }}</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('javascript-plugins')
    
    @endpush
@endsection
