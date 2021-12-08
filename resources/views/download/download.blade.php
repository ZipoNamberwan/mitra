@extends('layout/main')
@section('stylesheet')
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
@endsection

@section('container')
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="ni ni-app"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Unduh</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">Unduh Laporan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formupdate" autocomplete="off" method="post" action="/download" class="needs-validation d-inline" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="type">Jenis Laporan</label>
                                <select onchange="onTypeChange()" id="type" class="form-control @error('type') is-invalid @enderror" data-toggle="select" name="type">
                                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>1. Biodata Mitra</option>
                                    <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>2. Mitra Survey yang Sedang Berjalan</option>
                                    <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>3. Mitra Survey Tertentu</option>
                                    <option value="4" {{ old('type') == '4' ? 'selected' : '' }}>4. Daftar Survey</option>
                                    <option value="5" {{ old('type') == '5' ? 'selected' : '' }}>5. Statistik Mitra</option>
                                </select>
                                @error('type')
                                <div class="error-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div id="survey" class="form-row" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="survey">Pilih Survey</label>
                                <select class="form-control @error('survey') is-invalid @enderror" data-toggle="select" name="survey">
                                    @foreach ($surveys as $survey)
                                    <option value="{{ $survey->id }}" {{ @session('survey-id') == $survey->id ? 'selected' : '' }}>{{ $survey->name }}</option>
                                    @endforeach
                                </select>
                                @error('survey')
                                <div class="error-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" id="sbmtbtn" type="submit">Unduh</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('optionaljs')
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>

<script>
    function onTypeChange() {
        var type = document.getElementById('type');
        if(type.options[type.selectedIndex].value = "1"){
            type.submit("/exportmitra");
        } else (type.options[type.selectedIndex].value = "2")
            type.submit("/exportsurvey");
        }


        var survey = document.getElementById('survey');

        if (type.options[type.selectedIndex].value != "3") {
            survey.style.display = "none";
        } else {
            survey.style.display = "block";
        }
    }
</script>
@endsection