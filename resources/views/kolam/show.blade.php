@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('addFish.create', $kolam->id) }}" class="btn btn-primary m-b-md">Tambah Isi Kolam</a>
                    <h5 class="card-title">Lihat Kolam</h5>
                    <div class="form-group">
                        <label for="nomor_kolam">Nomor Kolam</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam"
                            placeholder="Nomor Kolam" value="{{ old('nomor_kolam', $kolam->nomor_kolam) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nomor_kolam">Ukuran Ikan (cm)</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam"
                            placeholder="Nomor Kolam" value="{{ old('nomor_kolam', $kolam->ukuran_ikan) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nomor_kolam">Tanggal Dibuat</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam"
                            placeholder="Nomor Kolam" value="{{ old('nomor_kolam', $kolam->created_at->format('M d, Y')) }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Data Ikan</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Sortir</th>
                                <th>Asal Ikan</th>
                                <th>Jumlah Bobot</th>
                                <th>Sortir Berikutnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ikans as $ikan)
                                @if ($ikan->fishpond_id == $kolam->id)
                                    <tr>
                                        <td>{{ $ikan->id }}</td>
                                        <td>{{ $ikan->created_at->format('M d, Y') }}</td>
                                        <td>{{ $ikan->fishpond->nomor_kolam }}</td>
                                        <td>{{ $ikan->jumlah_bobot }} Kg</td>
                                        <td>{{ date('M d, Y', strtotime($ikan->sortir_berikut)) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            @php
                                $total_bobot = 0;
                                foreach ($ikans as $ikan) {
                                    if ($ikan->fishpond_id == $kolam->id) {
                                        $total_bobot += $ikan->jumlah_bobot;
                                    }
                                }
                                $bobot_pakan = $total_bobot * 0.03;
                            @endphp
                            <tr>
                                <th></th>
                                <th><strong>Total Bobot: {{ $total_bobot }} Kg</strong></th>
                                <th>Bobot Pakan (3%): {{ $bobot_pakan }} Kg</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>

                    <a class="btn btn-primary my-4" href="{{ route('kolam.index') }}">Kembali</a>

                </div>
            </div>
        </div>
    </div>
@endsection
