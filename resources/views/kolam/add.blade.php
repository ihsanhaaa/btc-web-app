@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Ikan Di: {{ $kolam->nomor_kolam }}</h5>
                    <form action="{{ route('addToDBFish.create') }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fishpond_id" value="{{ $kolam->id }}">
                        <div class="form-group">
                            <label for="asal_ikan">Asal Ikan</label>
                            <input type="text" class="form-control" name="asal_ikan" id="asal_ikan"
                                placeholder="Asal Ikan" value="{{ old('asal_ikan') }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_ekor">Jumlah Ekor</label>
                            <input type="number" class="form-control" name="jumlah_ekor" id="jumlah_ekor"
                                placeholder="Jumlah Ekor" value="{{ old('jumlah_ekor') }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bobot">Jumlah Bobot</label>
                            <input type="number" class="form-control" name="jumlah_bobot" id="jumlah_bobot"
                                placeholder="Jumlah Bobot" value="{{ old('jumlah_bobot') }}">
                        </div>
                        <div class="form-group">
                            <label for="min">Panjang Ikan (Min)</label>
                            <input type="number" class="form-control" name="min" id="min"
                                placeholder="Panjang Minimal" value="{{ old('min') }}">
                        </div>
                        <div class="form-group">
                            <label for="max">Panjang Ikan (Max)</label>
                            <input type="number" class="form-control" name="max" id="max"
                                placeholder="Panjang Maksimal" value="{{ old('max') }}">
                        </div>
                        <div class="form-group">
                            <label for="sortir_berikut">Sortir Berikutnya</label>
                            <input type="date" class="form-control" name="sortir_berikut" id="sortir_berikut"
                                value="{{ old('sortir_berikut') }}">
                        </div>
                        <div class="form-group">
                            <label for="bobot_pakan">Bobot Pakan</label>
                            <input type="number" class="form-control" name="bobot_pakan" id="bobot_pakan"
                                placeholder="Tambahkan Bobot Pakan" value="{{ old('bobot_pakan') }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                placeholder="Tambahkan Keterangan" value="{{ old('keterangan') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
