@extends('layout/main')
@section('stylesheet')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->

    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-10">Database Mitra BPS Kabupaten Probolinggo - 3513</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-6 mt-3">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase mb-0">Jumlah Total Mitra</h5>
                                                <span class="h2 font-weight-bold mb-0">{{ $total_mitra }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-right mt--3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg/2560px-Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg.png"
                                    style="opacity: 0.4" width="200" height="150">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="h3 mb-0">Mitra Per Kecamatan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="mataChart" class="chartjs" width="500px" height="150px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <!-- Members list group card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Survey yang Sedang Berjalan</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3" id="list-group">
                            <li class="list-group-item px-0">
                                @foreach ($currentsurveys as $survey)
                                    <div class="row align-items-center">
                                        <div class="col ml--2 mb-3">
                                            <h4 class="mb-0">
                                                <a> {{ $survey->name }} </a>
                                            </h4>
                                            <span class="text-success ml-3">●</span>
                                            <small>{{ $survey->start_date }} - </small>
                                            <span class="text-warning">●</span>
                                            <small>{{ $survey->end_date }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mitra Dengan Penilaian Terbaik</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Mitra</th>
                                    <th scope="col">Nilai</th>

                            </thead>
                            <tbody>
                                @foreach ($mitras as $mitra)
                                    <tr>
                                        <th scope="row">
                                            {{ $mitra->name }}
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">100</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-0 mt-2">Mitra Survey Yang Sedang Berjalan</h3>
                            </div>
                            <div class="col-6 mb-0">
                                <select id="survey" name="survey" class="form-control" data-toggle="select"
                                    onchange="filterSurvey()">
                                    <option value="0" disabled selected> -- Pilih Survey -- </option>
                                    @foreach ($currentsurveys as $survey)
                                        <option value="{{ $survey->id }}"
                                            {{ @session('survey-id') == $survey->id ? 'selected' : '' }}>
                                            {{ $survey->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="row-table">
                                <div class="table-responsive">
                                    <table class="table" id="datatable-id" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('optionaljs')
    <script src="/assets/vendor/datatables2/datatables.min.js"></script>
    <script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
    <script src="/assets/vendor/momentjs/moment-with-locales.js"></script>
    <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="/assets/vendor/select2/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>
    

    <script type="text/javascript">
        var labels = ["Dringu", "Gending", "Tongas", "Leces", "Dingu", "Krucil", "Wonoasih", "Paiton"];
        var data = ["19","11","7","21","12","22","14","11"];
        var ctx = document.getElementById("mataChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Statistik User',
                    backgroundColor: '#008080',
                    borderColor: '#00FA9A',
                    data: data
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject
                                .numSteps;
                        }
                    }
                }
            },
        });
    </script>

    <script>
        var surveyflash = '{{ @session('survey-id') ?? 0 }}';

        var table = $('#datatable-id').DataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            "ajax": {
                "url": '/recruitment-data/' + surveyflash,
                "type": 'GET',
            },
            "select": {
                "style": 'multi',
            },
            "columns": [{
                    "responsivePriority": 8,
                    "width": "2.5%",
                    "orderable": false,
                    "data": "index",
                },
                {
                    "responsivePriority": 1,
                    "width": "12%",
                    "data": "name",
                },
                {
                    "responsivePriority": 1,
                    "width": "10%",
                    "data": "email",
                },
            ],
        });

        function filterSurvey() {
            var e = document.getElementById('survey');
            var idsurvey = e.options[e.selectedIndex].value;
            table.ajax.url('/recruitment-data/' + idsurvey).load();
            setSurveyInput(e.value);
        }
    </script>


@endsection