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
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Database Mitra</title>
                            <style>
                                body, h1, p, a, td, span {
                                    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                                span {
                                    color: black;
                                }
                            </style>
                        </head>
                    </div>
                </div>
                <div class="wrap">
                    <h1 align="center"><span>BIODATA MITRA</span></h1>
                    <table>
                        <tr>
                            <td rowspan="15" width="150px"> <img src="" alt="null" width="175px" style="display: block;border-radius: 10%;border-color:black;margin:10px" border="2px" ></td>
                        </tr>
                        <tr>
                            <td><b>E-mail</b></td><td>:</td><td><a href=""></a></td>
                        </tr>
                        <tr>
                            <td><b>Kode</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Nama Panggilan</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>    
                            <td><b>Pendidikan</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Profession</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Desa</b></td>
                            <td>:</td> <td></td>
                        </tr>
                        <tr>
                            <td><b>Kecamatan</b></td>
                            <td>:</td> <td></td>
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