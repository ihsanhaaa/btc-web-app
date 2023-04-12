@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lihat Data Pengeluaran</h5>
                    <div class="form-group">
                        <label>Uraian</label>
                        <input type="text" class="form-control" value="{{ $pengeluaran->uraian }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Foto Nota</label><br>
                        <img class="img-fluid" alt="" src="{{ asset('image/' . $pengeluaran->image) }}"  width="300">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" value="Rp. {{ number_format((float) $pengeluaran->harga) }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Dibuat</label>
                        <input type="text" class="form-control" value="{{ $pengeluaran->created_at }}" disabled>
                    </div>

                    <a class="btn btn-primary" href="{{ route('pengeluaran-keratom.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
