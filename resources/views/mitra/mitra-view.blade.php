@extends('layout/main')
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- <link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />

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
                            <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                            {{-- <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
                            {{-- <style>
                                body, h1, p, a, td, span {
                                    font-family: sans-serif;
                                    text-decoration: none;
                                    color: black;
                                } 
                                .wrap {
                                    background-color:rgba(255, 255, 255, 0.7);
                                    width: 800px;
                                    color:black;
                                    margin: 20px auto;
                                    padding:15px;
                                }
                                /* span {
                                    color: black;
                                } */
                            </style> --}}
                    </div>
                </div>
                <div>
                    <h1 align="center"><span>BIODATA MITRA</span></h1>
                    <table class="table" align="center">
                        <tr>
                            <td rowspan="12">
                            <img {{ $mitra->photo }} alt="null" style="border-radius: 10%;border-color:black;margin: 35px"></td>
                        </tr>
                        <tr>
                            <td width="10px"><a>E-mail</a></td>
                            <td>:</td><td>{{ $mitra->email }}</td>
                        </tr>
                        <tr>
                            <td><a>Kode</a></td>
                            <td>:</td> <td>{{ $mitra->code }}</td>
                        </tr>
                        <tr>
                            <td><a>Nama</a></td>
                            <td>:</td> <td>{{ $mitra->name }}</td>
                        </tr>
                        <tr>
                            <td><a>Nama Panggilan</a></td>
                            <td>:</td> <td>{{ $mitra->nickname }}</td>
                        </tr>
                        <tr>
                            <td><a>Jenis Kelamin</a></td>
                            <td>:</td> <td>{{ $mitra->sex }}</td>
                        </tr>
                        <tr>    
                            <td><a>Pendidikan</a></td>
                            <td>:</td> <td>{{ $mitra->education }}</td>
                        </tr>
                        <tr>
                            <td><a>Tanggal Lahir</a></td>
                            <td>:</td> <td>{{ $mitra->birtdate }}</td>
                        </tr>
                        <tr>
                            <td><a>Profesi</a></td>
                            <td>:</td> <td>{{ $mitra->profession }}</td>
                        </tr>
                        <tr>
                            <td><a>Alamat</a></td>
                            <td>:</td> <td>{{ $mitra->address }}</td>
                        </tr>
                        <tr>
                            <td><a>Desa</a></td>
                            <td>:</td> <td>{{ $mitra->village }}</td>
                        </tr>
                        <tr>
                            <td><a>Kecamatan</a></td>
                            <td>:</td> <td>{{ $mitra->subdistrict }}</td>
                        </tr>
                    </table>
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

@endsection