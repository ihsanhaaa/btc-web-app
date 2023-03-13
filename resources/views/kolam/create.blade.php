@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Kolam</h5>
                <form action="{{ route('kolam.store') }}" class="needs-validation" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nomor_kolam">Nomor Kolam</label>
                        <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam" placeholder="Nomor Kolam" value="{{ old('nomor_kolam') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
