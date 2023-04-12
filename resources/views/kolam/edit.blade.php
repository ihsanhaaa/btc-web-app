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
                    <h5 class="card-title">Edit Kolam</h5>
                    <form action="{{ route('kolam.update', $kolam->id) }}" class="needs-validation" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nomor_kolam">Nomor Kolam</label>
                            <input type="text" class="form-control" name="nomor_kolam" id="nomor_kolam"
                                placeholder="Nomor Kolam" value="{{ old('nomor_kolam', $kolam->nomor_kolam) }}">
                        </div>
                        <div class="form-group">
                            <label for="ukuran_ikan">Ukuran Ikan (cm)</label>
                            <input type="text" class="form-control" name="ukuran_ikan" id="ukuran_ikan"
                                placeholder="Panjang Ikan" value="{{ old('ukuran_ikan', $kolam->ukuran_ikan) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
