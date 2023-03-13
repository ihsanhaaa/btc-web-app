@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lihat Kolam</h5>
                    <div class="form-group">
                        <label for="nomor_kolam">Nomor Kolam</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam" placeholder="Nomor Kolam"
                            value="{{ old('nomor_kolam', $kolam->nomor_kolam) }}">
                    </div>
                    <div class="form-group">
                        <label for="nomor_kolam">Tanggal Dibuat</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam" placeholder="Nomor Kolam"
                            value="{{ old('nomor_kolam', $kolam->created_at) }}">
                    </div>
                    <a class="btn btn-primary" href="{{ route('kolam.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
