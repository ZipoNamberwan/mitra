@extends('layout.main')
@section('stylesheet')
    <link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
@endsection
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottpm"></div>
    <h1 class="h2">Tambah Mitra</h1>
    <div class="col-lg-8">
        <form method="POST" action="/mitras" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom03" placeholder="nama@gmail.com">
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Kode Mitra</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="validationCustom03" >
                @error('code')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" >
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Nama Panggilan</label>
                <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" id="validationCustom03" >
                @error('nickname')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Foto</label>
                <div class="custom-file">
                  <input name="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror"
                       id="photo" lang="en">
                  <label class="custom-file-label" for="photo">Select file</label>
                </div>
                @error('photo')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
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
            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Profesi</label>
                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" id="validationCustom03" >
                @error('profession')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-control-label" for="validationCustom03">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="validationCustom03" >
                @error('address')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
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
              
            <div class="col-md-6 mb-3">
                <label >Jenis Kelamin</label>
                <div class="custom-control custom-radio mb-3">
                    <input name="sex" class="custom-control-input" id="sex_radio1" value="L" type="radio" >
                    <label class="custom-control-label" for="sex_radio1" >Laki-laki</label>
                </div>
                    
                <div class="custom-control custom-radio mb-3">
                    <input name="sex" class="custom-control-input" id="sex_radio2" value="P" type="radio">
                    <label class="custom-control-label" for="sex_radio2">Perempuan</label>
                  </div>
            </div>
            @error('sex')
              <div class="div">
                error
              </div>    
              @enderror
            <div class="col-md-6 mb-3">
              <label class="form-control-label">Desa</label>
                    <select name="village" class="form-control" data-toggle="select" name="village">
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
              <div class="col-md-6 mb-3">
                <label class="form-control-label">Kecamatan</label>
                      <select name="subdistrict" class="form-control" data-toggle="select" name="subdistrict">
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
            <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          </form>
    </div>
    
@endsection

@section('optionaljs')
  <script src="/assets/vendor/select2/dist/js/select2.min.js"></script>    
  <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


@endsection