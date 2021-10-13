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
                            <li class="breadcrumb-item"><a href="#">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mitra Survey</li>
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
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">Daftar Survey Mitra</h3>
                        </div>
                        
                        <div class="col-6 text-right">
                            <a href="{{url('/recruitments/create')}}" class="btn btn-primary btn-round btn-icon mb-2" data-toggle="tooltip" data-original-title="Tambah mitra">
                                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                <span class="btn-inner--text">Tambah</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <select  id="surveys" name="surveys" class="form-control" data-toggle="select" onchange="filterSurvey()"  >
                                <option value="0" disabled selected> -- Pilih Survey -- </option>
                                    @foreach ($surveys as $survey)
                                        <option  value="{{ $survey->id }}">{{ $survey->name }}</option>  
                                     @endforeach
                            </select>
                        </div>  
                        
                </div>
                <div class="table-responsive py-4">
                    <table class="table" id="datatable-id" width="100%">
                        <thead class="thead-light">
                            <tr>
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

@endsection
@section('optionaljs')
<script src="/assets/vendor/datatables2/datatables.min.js"></script>
<script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="/assets/vendor/momentjs/moment-with-locales.js"></script>
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>    

<script>
    var table = $('#datatable-id').DataTable({
        "responsive": true,
        "order": [],
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": '/recruitment-data/1',
            "type": 'GET'
        },
        "columns": [{
                "responsivePriority": 8,
                "width": "2.5%",
                "orderable": false,
                "data": "index",
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
            {
                "responsivePriority": 1,
                "width": "5%",
                "data": "phone",
            },
             {
                "responsivePriority": 1,
                "width": "5%",
                "data": "status_id",
            }
        ],
        "language": {
            'paginate': {
                'previous': '<i class="fas fa-angle-left"></i>',
                'next': '<i class="fas fa-angle-right"></i>'
            }
        }
    });

    function filterSurvey(){
        var e=document.getElementById('surveys');
        var idsurvey = e.options[e.selectedIndex].value;
        table.ajax.url('/recruitment-data/' + idsurvey ).load();
        console.log('/recruitment-data/' + idsurvey);
    }
</script>

<script>
    function deletemitra($id, $name) {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin Hapus Mitra Ini?',
            text: $name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formdelete' + $id).submit();
            }
        })
    }
</script>

<script>
    function changeStatus(id) {
        var checkboxes = document.getElementsByName('published' + id);
        var loading = document.getElementById('loading-background');
        var value = checkboxes[checkboxes.length - 1].checked;
        loading.style.display = 'block';
        $.ajax({
            url: "{{url('mitras/changestatus/')}}/" + id,
            success: function(result, status, xhr) {
                loading.style.display = 'none';
                checkboxes.forEach(function(item, index) {
                    item.checked = value;
                });
            },
            error: function(xhr, status, error) {
                loading.style.display = 'none';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                }).then((result) => {
                    checkboxes.forEach(function(item, index) {
                        item.checked = !value;
                    });
                });
            },
            data: {
                published: value ? 1 : 0,
            },
            type: "patch",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
</script>
@endsection