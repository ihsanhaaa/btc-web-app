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
                    <h5 class="card-title">Tambah Data Pengeluaran Ikan</h5>
                    <form action="{{ route('pengeluaran-ikan.store') }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="uraian">Uraian</label>
                            <input type="text" class="form-control" name="uraian" id="uraian"
                                placeholder="Masukan Uraian" value="{{ old('uraian') }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Pengeluaran</label>
                            <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                <option value="{{ old('jenis', 'Kolam') }}">Kolam</option>
                                <option value="{{ old('jenis', 'Pakan') }}">Pakan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga"
                                value="{{ old('harga') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Foto Nota</label>
                            <input class="form-control" name="image" id="image" type="file">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
