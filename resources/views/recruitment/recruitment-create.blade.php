@extends('layout/main')
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/vendor/datatables2/CheckBox/dataTables.checkboxes.css" rel="stylesheet" />

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
                            <li class="breadcrumb-item"><a href="/recruitments">Rekrutmen Mitra</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penerimaan</li>
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
                        <div class="col-12">
                            <h3 class="mb-2">Penerimaan Mitra</h3>
                            <p class="mb-0"><small>Menu ini digunakan untuk menambah mitra survei tertentu. Status dari mitra yang ditambah otomatis 'diterima'.</small></p>
                            <p class="mb-0"><small>Pertama: pilih survei. Kedua: pilih mitra yang akan diterima sebagai petugas.</small></p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="submit-form" onsubmit="return onClickSave()" action="/recruitments" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-control-label mb-3" for="survey">1. Pilih Survey*</label>
                                <select onchange="filterSurvey()" id="survey" name="survey" class="form-control @error('survey') is-invalid @enderror" data-toggle="select">
                                    <option value="0" selected disabled> -- Pilih Survey -- </option>
                                    @foreach ($surveys as $survey)
                                    <option value="{{ $survey->id }}">{{ $survey->name }}</option>
                                    @endforeach
                                </select>
                                @error('survey')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row" id="row-table">
                            <div class="col-md-6 mb-2">
                                <label class="form-control-label" for="phone">2. Pilih Mitra*</label>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table" id="datatable-id" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
                                                <th>Foto</th>
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
                        <button id="submit-button" class="btn btn-primary mt-3" type="submit" disabled>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('optionaljs')
<script src="/assets/vendor/datatables2/datatables.min.js"></script>
<script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="/assets/vendor/momentjs/moment-with-locales.js"></script>
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="/assets/vendor/datatables2/CheckBox/dataTables.checkboxes.min.js"></script>

<script>
    var table = $('#datatable-id').DataTable({
        "order": [],
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": '/mitra-data',
            "type": 'GET',
        },
        "select": {
            "style": 'multi',
        },
        "columns": [{
                "orderable": false,
                "width": "2.5%",
                "data": "id"
            }, {
                "responsivePriority": 2,
                "width": "5%",
                "orderable": false,
                "data": "photo",
                "render": function(data, type, row) {
                    return "<div class=\"avatar bg-transparent\">" +
                        "<img src=\"" + data + "\" />" +
                        "</div>";
                }
            }, {
                "responsivePriority": 1,
                "width": "12%",
                "data": "name",
            },
            {
                "responsivePriority": 1,
                "width": "5%",
                "data": "email",
            },

        ],
        // untuk check box
        "columnDefs": [{
            "targets": 0,
            "checkboxes": {
                "selectRow": true,
            }
        }],
        "select": {
            "style": "multi",
        },
        "language": {
            'paginate': {
                'previous': '<i class="fas fa-angle-left"></i>',
                'next': '<i class="fas fa-angle-right"></i>'
            }
        }
    });

    var submitButton = document.getElementById('submit-button');
    var surveyselect = document.getElementById('survey');

    table.on('select', function(e, dt, type, indexes) {
        validateSaveButton();
    }).on('deselect', function(e, dt, type, indexes) {
        validateSaveButton();
    });

    function validateSaveButton() {
        var selectedsurvey = surveyselect.options[surveyselect.selectedIndex].value;
        var count = table.rows({
            selected: true
        }).count();
        if (count > 0 && selectedsurvey != 0) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    function filterSurvey() {
        validateSaveButton();
    }

    function onClickSave() {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah yakin menambah mitra survei ' + surveyselect.options[surveyselect.selectedIndex].text + '?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
        }).then((result) => {
            if (result.isConfirmed) {
                var submitForm = document.getElementById('submit-form');
                var rows_selected = table.column(0).checkboxes.selected();
                $.each(rows_selected, function(index, rowId) {
                    $(submitForm).append(
                        $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                    );
                });
                submitForm.submit();
            }
        })
    }
</script>

@endsection