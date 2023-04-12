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
                    <h5 class="card-title">Tambah Data Ikan Di: {{ $kolam->nomor_kolam }}</h5>
                    <form action="{{ route('addToDBFish.create') }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fishpond_id" value="{{ $kolam->id }}">
                        <div class="form-group @error('fishpond_id') is-invalid @enderror">
                            <select class="form-control @error('asal_ikan') is-invalid @enderror" name="asal_ikan">
                                @foreach ($data as $a)
                                    @if (old('$a_id') == $a->id)
                                        <option value="{{ $a->id }}" selected>
                                            {{ $a->nomor_kolam }}</option>
                                    @else
                                        <option value="{{ $a->id }}">{{ $a->nomor_kolam }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_bobot">Jumlah Bobot (Kg)</label>
                            <input type="number" class="form-control @error('jumlah_bobot') is-invalid @enderror" name="jumlah_bobot" id="jumlah_bobot"
                                placeholder="Jumlah Bobot" value="{{ old('jumlah_bobot') }}">
                        </div>
                        <div class="form-group">
                            <label for="sortir_berikut">Sortir Berikutnya</label>
                            <input type="date" class="form-control @error('sortir_berikut') is-invalid @enderror" name="sortir_berikut" id="sortir_berikut"
                                value="{{ old('sortir_berikut') }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                placeholder="Tambahkan Keterangan" value="{{ old('keterangan') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
