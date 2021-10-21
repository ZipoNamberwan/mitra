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
                            <li class="breadcrumb-item active" aria-current="page">Survey</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->

<div class="container-fluid mt--6">
    @if (session('success-edit') || session('success-create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-check-circle"></i></span>
        <span class="alert-text"><strong>Sukses! </strong>{{ session('success-create') }} {{ session('success-edit') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    @if (session('success-delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-check-circle"></i></span>
        <span class="alert-text"><strong>Sukses! </strong>{{ session('success-delete') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    <!-- Table -->
    <div class="row">
            <div class="col">
                <div class="card">
                    <form id="submit-form" onsubmit="return onClickSave()" action="/recruitments" method="POST">
                        @csrf
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="mb-1">Penilaian Survey Mitra</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable-id" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th></th>
                                            <th>Nama</th>
                                            <th>Penilaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <button id="submit-button" class="btn btn-primary mt-3" type="submit">Simpan</button>
                        </div>
                </div>
                </form>
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
            "url": '/mitra-data',
            "type": 'GET'
        },
        "columns": [{
                "responsivePriority": 8,
                "width": "2.5%",
                "orderable": false,
                "data": "index",
            },
            {
                "responsivePriority": 1,
                "width": "10%",
                "data": "name",
            },
            {
                "responsivePriority": 7,
                "width": "2.5%",
                "orderable": false,
                "data": "id",
                "stateSave": true,
                "render": function(data, type, row) {
                    return "<input type=text class=form-control placeholder=MasukkanNilai>";
                }
            }
        ],
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
        function onChangeSurvey(sel) {
            validateSaveButton();
        }

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
</script>

<script>
        function onClickSave() {
            event.preventDefault();
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
            Swal.fire({
                title: 'Apakah yakin ingin menyimpan ini?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                denyButtonText: `Jangan Simpan`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                    submitForm.submit();
                } else if (result.isDenied) {
                    Swal.fire('Perubahan Tidak Tersimpan', '')
                }
            })
        }
    </script>

<script type="text/javascript"> 
var elem = document.getElementById("example"); // Get text field
elem.value = "My default value"; // Change field
</script>
@endsection