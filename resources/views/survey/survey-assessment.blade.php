@extends('layout/main')
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <li class="breadcrumb-item"><a href="/surveys">Survey</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
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
                            <h3 class="mb-0">Penilaian Mitra</h3>
                            <p class="mb-0"><small>Menu ini digunakan untuk melakukan penilaian mitra</small></p>
                            <p class="mb-0"><small>Range nilai yang bisa diberikan adalah 1 (Sangat Buruk) sampai 10 (Sangat Baik). Nilai default adalah 7 (Sedang)</small></p>
                            <p class="mb-0"><small>Jika indikator input warna hijau berarti nilai sudah tersimpan, jika merah berarti gagal simpan</small></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table" id="datatable-id" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Penilaian</th>
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

@endsection
@section('optionaljs')
<script src="/assets/vendor/datatables2/datatables.min.js"></script>
<script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="/assets/vendor/momentjs/moment-with-locales.js"></script>

<script>
    var table = $('#datatable-id').DataTable({
        "responsive": true,
        "order": [],
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": '/assessment-data/{{ $idsurvey }}',
            "type": 'GET'
        },
        "columns": [{
                "responsivePriority": 7,
                "width": "5%",
                "orderable": false,
                "data": "index",
            },
            {
                "responsivePriority": 1,
                "width": "15%",
                "data": "name",
            },
            {
                "responsivePriority": 1,
                "width": "30%",
                "orderable": false,
                "searchable": false,
                "data": "id",
                "render": function(data, type, row) {
                    return '<div style="width:200px;"><input id="assesment' + row.idpivot + '" onfocusout="onFocusOut(' + row.idpivot + ')" type="number" min="0" max="5" class="form-control" name="rating[]" value="' + row.value + '">' +
                        '<input type="hidden" class="form-control" value="' + row.idpivot +
                        '" name="idpivot[]"></div>';
                }
            },
        ],

        "language": {
            'paginate': {
                'previous': '<i class="fas fa-angle-left"></i>',
                'next': '<i class="fas fa-angle-right"></i>'
            }
        }
    });
</script>

<script>
    function onFocusOut(idpivot) {
        element = document.getElementById('assesment' + idpivot);
        element.classList.remove('is-valid');
        element.classList.remove('is-invalid');
        $.ajax({
            url: "/assessment",
            success: function(result, status, xhr) {
                if (result.is_success) {
                    element.classList.add("is-valid");
                } else {
                    element.classList.add("is-invalid");
                }
            },
            error: function(xhr, status, error) {
                element.classList.add("is-invalid");
            },
            data: {
                value: element.value,
                idpivot: idpivot
            },
            type: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
</script>



@endsection