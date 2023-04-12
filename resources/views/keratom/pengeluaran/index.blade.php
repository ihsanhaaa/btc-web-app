@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}.
                </div>
            @endif

            {{-- View --}}
            {{-- <canvas id="myChart"></canvas> --}}

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pengeluaran-keratom.create') }}" class="btn btn-primary m-b-md">Tambah Data</a>
                    <a href="{{ url('/spending_keratom/export') }}" class="btn btn-primary m-b-md">Download Data</a>
                    <h5 class="card-title">Data Pengeluaran Keratom</h5>

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
                            @foreach ($pengeluarans as $pengeluaran)
                                @php
                                    $totalPengeluaran = $pengeluaran->sum('harga');
                                @endphp
                                <tr>
                                    <td>{{ $pengeluaran->id }}</td>
                                    <td>
                                        <a href="{{ route('pengeluaran-keratom.show', $pengeluaran->id) }}" style="color: #7d8581;">{{ $pengeluaran->uraian }}</a>
                                    </td>
                                    <td>{{ $pengeluaran->created_at->format('M d, Y') }}</td>
                                    <td>Rp. {{ number_format((float) $pengeluaran->harga) }}</td>
                                    <td>
                                        @if ($pengeluaran->image == null)
                                            <p>Tidak ada foto</p>
                                        @else
                                            <a href="{{ asset('image/' . $pengeluaran->image) }}">Lihat Foto</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('pengeluaran-keratom.show', $pengeluaran->id) }}">Lihat</a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th><strong>Total Pengeluaran: Rp. {{ number_format((float) $totalPengeluaran) }}</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('javascript-plugins')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    
    @endpush
@endsection
