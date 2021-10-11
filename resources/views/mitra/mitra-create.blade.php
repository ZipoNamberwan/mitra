@extends('layout.main')
@section('stylesheet')
    <link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/container.css">
    <link rel="stylesheet" href="/assets/css/text.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottpm"></div>
    <h1 class="h2">Tambah Mitra</h1>
    
      <form method="POST" action="/mitras" enctype="multipart/form-data">
          @csrf
    <div class="float-container">
      <div class="float-child1">
        <div class="col-md-14 mb-3">
          <label class="form-control-label" for="email">Email</label>
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom03" placeholder="nama@gmail.com">
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
      </div>

      <div class="col-md-14 mb-3">
        <label class="form-control-label" for="phone">Nomor Handphone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="validationCustom03" >
        @error('phone')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-2 mb-3">
            <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
    </div>

      <div class="col-md-14 mb-3 ">
        <label class="form-control-label " for="validationCustom03">Kode Mitra</label>
        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="validationCustom03" >
        @error('code')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-14 mb-3">
      <label class="form-control-label" for="validationCustom03">Nama Lengkap</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" >
      @error('name')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
  </div>

  <div class="col-md-14 mb-3">
    <label class="form-control-label" for="validationCustom03">Nama Panggilan</label>
    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" id="validationCustom03" >
    @error('nickname')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
</div>

<div class="col-md-14 mb-3">
  <label class="form-control-label" for="">Foto</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="photo" name="photo" lang="en" onchange="previewPhoto()">
      <label class="custom-file-label" for="customFileLang" id="photolabel">Select file</label>
    </div>
  
</div>

  <div class="col-md-14 mb-3">
    <div class="form-group">
      <label class="form-control-label" for="exampleDatepicker">Tanggal Lahir</label>
      <input name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" placeholder="Select date" type="date">
      @error('birthdate')
          <div class="invalid-feedback">
          {{$message}}
          </div>
      @enderror
    </div>
  </div>

  <div class="col-md-14 mb-3">
    <label >Jenis Kelamin</label>
    <div class="custom-control custom-radio mb-3">
        <input name="sex" class="custom-control-input" id="sex_radio1" value="L" type="radio" >
        <label class="custom-control-label" for="sex_radio1" >Laki-laki</label>
    </div>
        
    <div class="custom-control custom-radio mb-3">
        <input name="sex" class="custom-control-input" id="sex_radio2" value="P" type="radio">
        <label class="custom-control-label" for="sex_radio2">Perempuan</label>
      </div>
      @error('sex')
  <div class="text-valid">
    {{ $message }}
  </div>    
  @enderror 
</div>

      </div>
      
      <div class="float-child2">
        
        <div class="col-md-14 mb-3">
          <label class="form-control-label">Pendidikan</label>
                <select name="education" class="form-control" data-toggle="select" >
                 <option value="0" disabled selected>Pilih Pendidikan terakhir Anda</option>
                  @foreach ($educations as $education)
                  <option value="{{ $education->id }}">{{ $education->name }}</option>  
              @endforeach
                </select>
                @error('education')
          <div class="text-valid">
            {{$message}}
          </div>    
          @enderror
          </div>

        <div class="col-md-14 mb-3">
          <label class="form-control-label" for="validationCustom03">Profesi</label>
          <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" id="validationCustom03" >
          @error('profession')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
      </div>  
        
      <div class="col-md-14 mb-3">
          <label class="form-control-label" for="validationCustom03">Alamat</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="validationCustom03" >
          @error('address')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
      </div>
      
        
        
      
     
      
        <div class="col-md-14 mb-3">
          <label class="form-control-label">Kecamatan</label>
                <select id="subdistrict" name="subdistrict" class="form-control" data-toggle="select" name="subdistrict" required>
                  <option value="0" disabled selected> -- Pilih Kecamatan Anda -- </option>
                  @foreach ($subdistricts as $subdistrict)
                  <option  value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>  
                @endforeach
                </select>  
          </div>
          @error('subdistrict')
        <div class="text-valid">
          {{ $message }}
        </div>    
        @enderror

        <div class="col-md-14 mb-3">
          <label class="form-control-label">Desa</label>
                <select id="village" name="village" class="form-control" data-toggle="select" name="village">
                  
                </select>
          </div>
          @error('village')
          <div class="text-valid">
            {{ $message }}
          </div>    
          @enderror
        
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
      </div>
            
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
    url: 'village/' + id,
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

<script>
//     $(document).ready(function(){
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('#add_button'); //Add button selector
//     var wrapper = $('.float-child1'); //Input field wrapper
//     var fieldHTML = '<div class="form-group add"><div class="form-control-label">';
//     fieldHTML=fieldHTML + '<div class="col-md-10"><input class="form-control" type="text" name="phone" /></div>';
//     fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
//     fieldHTML=fieldHTML + '</div></div>'; 
//     var x = 1; //Initial field counter is 1
     
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//             $(wrapper).append(fieldHTML); //Add field html
//         }
//     });
     
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_button', function(e){
//         e.preventDefault();
//         $(this).parent('').parent('').remove(); //Remove field html
//         x--; //Decrement field counter
//     });
// });
</script>
  
  

@endsection
