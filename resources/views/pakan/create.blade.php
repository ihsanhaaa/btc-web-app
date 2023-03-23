@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data</h5>
                    <form action="{{ route('pakan.store') }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="uraian">Uraian</label>
                            <input type="text" class="form-control" name="uraian" id="uraian"
                                placeholder="Masukan Uraian" value="{{ old('uraian') }}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                placeholder="Harga" value="{{ old('harga') }}">
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
