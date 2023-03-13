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
                            <label for="image">Foto Nota</label>
                            <input class="form-control" name="image" id="image" type="file">
                        </div>
                        <div class="form-group">
                            <label for="pemasukan">Pemasukan</label>
                            <input type="number" class="form-control" name="pemasukan" id="pemasukan"
                                placeholder="Jumlah Pemasukan" value="{{ old('pemasukan') }}">
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran">Pengeluaran</label>
                            <input type="number" class="form-control" name="pengeluaran" id="pengeluaran"
                                placeholder="Jumlah Pengeluaran" value="{{ old('pengeluaran') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
