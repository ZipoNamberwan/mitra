@extends('layout/main')
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<link href="/assets/css/text.css">
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
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->

<div class="container-fluid mt--6">
    @if (session('message'))
    <div class="alert alert-{{session('type') == 'approve' ? 'success':'danger'}} alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-check-circle"></i></span>
        <span class="alert-text"><strong>Sukses! </strong>{{ session('message') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">Rekrutmen Mitra</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('/recruitments/create') }}" class="btn btn-primary btn-round btn-icon mb-2" data-toggle="tooltip" data-original-title="Tambah mitra">
                                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                <span class="btn-inner--text">Penerimaan Mitra</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <select id="survey" name="survey" class="form-control" data-toggle="select" onchange="filterSurvey()">
                                <option value="0" disabled selected> -- Pilih Survey -- </option>
                                @foreach ($surveys as $survey)
                                <option value="{{ $survey->id }}" {{ @session('survey-id') == $survey->id ? 'selected' : '' }}>{{ $survey->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-14 mb-3" id="form-approval">
                        <div class="col">
                            <div class="row">
                                <form id="submit-form" onsubmit="return onClickAccept()" action="/recruitments/accept" method="POST" class="mr-3">
                                    @csrf
                                    <input type="hidden" id="surveyid" name="surveyid" />
                                    <button id="accept-button" type="submit" class="btn btn-success btn-sm" disabled>Terima</button>
                                </form>
                                <form id="reject-form" onsubmit="return onClickReject()" action="/recruitments/reject" method="POST">
                                    @csrf
                                    <input type="hidden" id="surveyid" name="surveyid" />
                                    <button id="reject-button" type="submit" class="btn btn-danger btn-sm" disabled>Tolak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="row-table">
                            <div class="table-responsive">
                                <table class="table" id="datatable-id" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP Utama</th>
                                            <th>Status</th>
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
<script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="/assets/vendor/momentjs/moment-with-locales.js"></script>
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="/assets/vendor/datatables2/CheckBox/dataTables.checkboxes.min.js"></script>

<script>
    var surveyflash = '{{@session("survey-id") ?? 0}}';

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

                "width": "2.5%",
                "orderable": false,
                "data": "id",
            }, {
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
                "width": "5%",
                "data": "email",
            },
            {
                "responsivePriority": 1,
                "width": "5%",
                "data": "phone",
            },
            {
                "responsivePriority": 1,
                "width": "5%",
                "data": "status_id",
                "render": function(data, type, row) {
                    if (type == 'display') {
                        return '<span class="badge badge-' + row.status_color + '">' + data + '</span>';
                    }
                    return data;
                }
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

    var acceptbutton = document.getElementById('accept-button');
    var rejectbutton = document.getElementById('reject-button');

    table.on('select', function(e, dt, type, indexes) {
        var count = table.rows({
            selected: true
        }).count();
        if (count > 0) {
            acceptbutton.disabled = false;
            rejectbutton.disabled = false;
        } else {
            acceptbutton.disabled = true;
            rejectbutton.disabled = true;
        }
    }).on('deselect', function(e, dt, type, indexes) {
        var count = table.rows({
            selected: true
        }).count();
        if (count > 0) {
            acceptbutton.disabled = false;
            rejectbutton.disabled = false;
        } else {
            acceptbutton.disabled = true;
            rejectbutton.disabled = true;
        }
    });

    var surveyselect = document.getElementById('survey');
    if (surveyselect.options[surveyselect.selectedIndex].value == 0) {
        document.getElementById('form-approval').style.display = "none";
        document.getElementById('row-table').style.display = "none";
    }

    function setSurveyInput(value) {
        var surveyinput = document.getElementsByName('surveyid');
        surveyinput.forEach(element => {
            element.value = value;
        });
    }

    setSurveyInput(surveyflash);

    function filterSurvey() {
        var e = document.getElementById('survey');
        var idsurvey = e.options[e.selectedIndex].value;
        table.ajax.url('/recruitment-data/' + idsurvey).load();
        setSurveyInput(e.value);
        document.getElementById('form-approval').style.display = "block";
        document.getElementById('row-table').style.display = "block";
    }
</script>

<script>
    function onClickAccept() {
        event.preventDefault();
        var acceptForm = document.getElementById('submit-form');
        var rows_selected = table.column(0).checkboxes.selected();
        $.each(rows_selected, function(index, rowId) {
            $(acceptForm).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
            );
        });
        acceptForm.submit();
    }

    function onClickReject() {
        event.preventDefault();
        var rejectForm = document.getElementById('reject-form');
        var rows_selected = table.column(0).checkboxes.selected();
        $.each(rows_selected, function(index, rowId) {
            $(rejectForm).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
            );
        });
        rejectForm.submit();
    }
</script>
@endsection