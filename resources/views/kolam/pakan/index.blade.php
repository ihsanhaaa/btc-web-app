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
                    <a href="{{ route('pakan.create') }}" class="btn btn-primary m-b-md">Tambah Data</a>
                    <h5 class="card-title">Data Pakan</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Harga</th>
                                <th>Tanggal Dibuat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPengeluaran = 0;
                            @endphp
                            @foreach ($pakans as $pakan)
                                @php
                                    $totalPengeluaran = $pakan->sum('harga');
                                @endphp
                                <tr>
                                    <td>{{ $pakan->id }}</td>
                                    <td>
                                        <a href="{{ route('pakan.show', $pakan->id) }}" style="color: #7d8581;">{{ $pakan->uraian }}</a>
                                    </td>
                                    <td>Rp. {{ number_format((float) $pakan->harga) }}</td>
                                    <td>{{ $pakan->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if ($pakan->image == null)
                                            <p>Tidak ada foto</p>
                                        @else
                                            <a href="{{ asset('image/' . $pakan->image) }}">Lihat Foto</a>
                                        @endif
                                    </td>
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
