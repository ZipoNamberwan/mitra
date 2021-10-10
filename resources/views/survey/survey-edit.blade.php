@extends('layout.main')
@section('stylesheet')
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
@endsection
@section('container')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="ni ni-app"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('/surveys')}}">Survey</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-2">Ubah Survey</h3>
                        <p class="mb-0"><small>*Wajib Diisi</small></p>
                    </div>
                    <!-- Card body -->
                    <div class="card-body m-0">
                        <form action="/surveys/{{$survey->id}}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="name">Nama Survey</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" value="{{@old('name', $survey->name)}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="start_date">Tanggal Mulai</label>
                                    <input name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Select date" type="date" value="{{@old('start_date', $survey->start_date)}}">
                                    @error('start_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="end_date">Tanggal Berakhir</label>
                                    <input name="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Select date" type="date" value="{{@old('end_date', $survey->end_date)}}">
                                    @error('end_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection