@extends('layout.main')
@section('stylesheet')
    <link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/container.css">
@endsection
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottpm"></div>
    <h1 class="h2">Update Data Mitra</h1>
    
    <form method="POST" action="/mitras/{{$mitra->email}}" enctype="multipart/form-data">
      @method('PUT') 
          @csrf
    <div class="float-container">
      <div class="float-child">
        <div class="col-md-14 mb-3">
          <label class="form-control-label" for="email">Email</label>
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom03" placeholder="nama@gmail.com" value="{{ $mitra->email }}">
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
      </div>
      
      <div class="col-md-14 mb-3 ">
        <label class="form-control-label " for="validationCustom03">Nomor Hp</label>
        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->phone }}">
        <div class="controls">
          <a href="#" id="addd_more">Add More</a>
          <a href="#" id="addd_more">Remove</a>
        </div>
        @error('code')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>

    {{-- <div class="wrapper">
      <div id='phone'>
        <input type="text" name="option[]" class="option" size="80" placeholder="phone number">
        <input type="text" name="option[]" class="option" size="80" placeholder="another phone number">
      </div>
      <div class="controls">
        <a href="#" id="addd_more"><i class=" fa fa-plus"></i>Add More</a>
        <a href="#" id="addd_more"><i class=" fa fa-plus"></i>Remove</a>
      </div>
    </div> --}}

      <div class="col-md-14 mb-3 ">
        <label class="form-control-label " for="validationCustom03">Kode Mitra</label>
        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->code }}">
        @error('code')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-14 mb-3">
      <label class="form-control-label" for="validationCustom03">Nama Lengkap</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->name }}" >
      @error('name')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
  </div>

  <div class="col-md-14 mb-3">
    <label class="form-control-label" for="validationCustom03">Nama Panggilan</label>
    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->nickname }}">
    @error('nickname')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
</div>

<div class="col-md-14 mb-3">
  <label class="form-control-label" for="">Foto</label>
  <img class="img-preview img-fluid mb-3">
  <img src="{{ asset('images/').$mitra->photo }}" height="10%" width="20%" alt="" >

    <div class="custom-file">
      <input type="file" class="custom-file-input" id="photo" name="photo" lang="en" onchange="previewPhoto()">
      <label class="custom-file-label" for="customFileLang" id="photolabel">Select file</label>
    </div>
  
</div>

<div class="col-md-14 mb-3">
  <div class="form-group">
    <label class="form-control-label" for="exampleDatepicker">Tanggal Lahir</label>
    <input name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" placeholder="Select date" type="date" value="{{ $mitra->birtdate }}">
    @error('birtdate')
        <div class="invalid-feedback">
        {{$message}}
        </div>
    @enderror
  </div>
</div>

  

<div class="col-md-6 mb-3">
  <label >Jenis Kelamin</label>
  <div class="custom-control custom-radio mb-3">
      <input name="sex" class="custom-control-input" id="sex_radio1" value="L" type="radio" {{ $mitra->sex == 'L'? 'checked' : ''}} >
      <label class="custom-control-label" for="sex_radio1" >Laki-laki</label>
  </div>
      
  <div class="custom-control custom-radio mb-3">
      <input name="sex" class="custom-control-input" id="sex_radio2" value="P" type="radio" {{ $mitra->sex == 'P'? 'checked' : ''}}>
      <label class="custom-control-label" for="sex_radio2">Perempuan</label>
    </div>
</div>
@error('sex')
<div class="div">
  error
</div>    
@enderror
   </div>
      
      <div class="float-child"> <!-- x -->
        
        
        <div class="col-md- mb-14">
          <label class="form-control-label">Pendidikan</label>
                <select name="education" class="form-control" data-toggle="select">
                  @foreach ($educations as $education)
                  <option value="{{ $education->id }}">{{ $education->name }}</option>  
              @endforeach
                </select>
  
          </div>
          @error('education')
          <div class="div">
            error
          </div>    
          @enderror

          <div class="col-md-14 mb-3">
            <label class="form-control-label" for="validationCustom03">Profesi</label>
            <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->profession }}">
            @error('profession')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
        </div>

      <div class="col-md-14 mb-3">
          <label class="form-control-label" for="validationCustom03">Alamat</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="validationCustom03" value="{{ $mitra->address }}">
          @error('address')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
      </div>
      
        
        
      
        <div class="col-md-14 mb-3">
          <label class="form-control-label">Kecamatan</label>
                <select name="subdistrict" class="form-control" data-toggle="select" name="subdistrict" id="subdistrict">
                  @foreach ($subdistricts as $subdistrict)
                    <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>  
                @endforeach
                </select>  
          </div>
          @error('subdistrict')
        <div class="div">
          error
        </div>    
        @enderror

        <div class="col-md-14 mb-3">
          <label class="form-control-label">Desa</label>
                <select name="village" class="form-control" data-toggle="select" name="village" id="village">
                  @foreach ($villages as $village)
                     <option value="{{ $village->id }}">{{ $village->name }}</option>  
                   @endforeach
                </select>
          </div>
          @error('village')
          <div class="div">
            error
          </div>    
          @enderror
        
      </div>
      <button type="submit" class="btn btn-primary" value="update">Simpan Perubahan</button>
          </form>
    
  
  </div>

    
@endsection

@section('optionaljs')
  <script src="/assets/vendor/select2/dist/js/select2.min.js"></script>    
  <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script>
    function previewPhoto() {
      var photolabel = document.getElementById('photolabel');
    const photo = document.querySelector('#photo');
      const imgPreview = document.querySelector('.img-preview');
      
      imgPreview.style.display = 'block';
      
      const oFReader = new FileReader();
      oFReader.readAsDataURL(photo.files[0]);
      photolabel.innerText = photo.files[0].name;

      oFReader.onload = function(OFREvent){
        imgPreview.src = OFREvent.target.result;
      }
      
  }
  </script>
  
  <script>
    $(document).ready(function () {
    $('#subdistrict').on('change', function () {
    let id = $(this).val();
    $('#village').empty();
    $('#village').append(`<option value="0" disabled selected>Processing...</option>`);
    $.ajax({
    type: 'GET',
    url: '/mitras/village/' + id,
    success: function (response) {
    var response = JSON.parse(response);
    console.log(response);   
    $('#village').empty();
    $('#village').append(`<option value="0" disabled selected>Pilih Desa Anda</option>`);
    response.forEach(element => {
        $('#village').append(`<option value="${element['id']}">${element['name']}</option>`);
        });
    }
});
});
});
</script>

@endsection
