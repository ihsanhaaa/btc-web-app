@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong><br>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Penjualan Ikan</h5>
                    <form action="{{ route('pemasukan-ikan.store') }}" class="needs-validation" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_jual">Tanggal Penjualan</label>
                            <input type="date" class="form-control @error('tanggal_jual') is-invalid @enderror" name="tanggal_jual" id="tanggal_jual"
                                value="{{ old('tanggal_jual') }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bobot">Jumlah Bobot (Kg)</label>
                            <input type="number" class="form-control @error('jumlah_bobot') is-invalid @enderror" name="jumlah_bobot" id="jumlah_bobot"
                                placeholder="Jumlah Bobot" value="{{ old('jumlah_bobot') }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual (/Kg)</label>
                            <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual"
                                placeholder="Harga Jual" value="{{ old('harga_jual') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
