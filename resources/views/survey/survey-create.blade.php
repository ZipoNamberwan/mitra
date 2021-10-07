@extends('layout.main')
@section('stylesheet')
    <link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
@endsection
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottpm"></div>
    <h1 class="h2">Tambah Mitra</h1>
    <form action="/surveys" method="POST">
        @csrf
        {{-- kolom nama survei --}}
        <div class="col-md-6 mb-3">
          <label class="form-control-label" for="name">Nama Survey</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" >
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        {{-- kolom tanggal mulai --}}
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="form-control-label" for="start_date">Tanggal Mulai</label>
                    <input name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Select date" type="date">
                        @error('start_date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
            </div>
        </div>

        {{-- kolom tanggal berakhir --}}
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="form-control-label" for="end_date">Tanggal Berakhir</label>
                    <input name="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Select date" type="date">
                        @error('end_date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
        </div>
        
    </form>
@endsection