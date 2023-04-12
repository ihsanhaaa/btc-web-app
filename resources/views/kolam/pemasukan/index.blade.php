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
                    <a href="{{ route('pemasukan-ikan.create') }}" class="btn btn-primary m-b-md">Tambah Data Penjualan</a>
                    <a href="{{ url('/income_fish/export') }}" class="btn btn-primary m-b-md">Download Data</a>
                    <h5 class="card-title">Data Pemasukan Ikan</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penjualan</th>
                                <th>Jumlah Bobot (Kg)</th>
                                <th>Harga Jual (/Kg)</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPengeluaran = 0;
                            @endphp
                            @foreach ($pemasukans as $pemasukan)
                                @php
                                    $totalPengeluaran = $pemasukan->sum('total_penjualan');
                                @endphp
                                <tr>
                                    <td>{{ $pemasukan->id }}</td>
                                    <td>{{ date_create($pemasukan->tanggal_jual)->format('M d, Y') }}</td>
                                    <td>{{ $pemasukan->jumlah_bobot }} Kg</td>
                                    <td>Rp. {{ number_format((float) $pemasukan->harga_jual) }}</td>
                                    <td>Rp. {{ number_format((float) $pemasukan->total_penjualan) }}</td>
                                    {{-- <td>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('pemasukan-ikan.show', $pemasukan->id) }}">Lihat</a>
                                        </div>
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th><strong>Total Pendapatan: Rp. {{ number_format((float) $totalPengeluaran) }}</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
