@extends('template.master')
@section('content')
<div class="pagetitle">
      <h1>Pendaftaran Pasien</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pasien</li>
          <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Pendaftaran Pasien</h5>

              <!-- General Form Elements -->
              <form action="{{ route('pasien.save') }}" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No Registrasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_regestrasi" id="no_regestrasi" value="{{$nomor_regestrasi}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No Rekam Medis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_rekam_medis" id="no_rekam_medis" value="{{$nomor_rekam}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Pasien</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pasien" id="nama_pasien">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                      <option selected>PILIH</option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Registrasi</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_regestrasi" id="id_regestrasi">
                      <option selected>PILIH</option>
                      @foreach($dataRegistrasi as $value)
                        <option value="{{$value->id_registrasi}}">{{$value->jenis_registrasi}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Layanan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_layanan" id="id_layanan">
                      <option selected>PILIH</option>
                      @foreach($dataPelayanan as $value)
                        <option value="{{$value->id_pelayanan}}">{{$value->jenis_pelayanan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Pembiyaan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_pembiayaan" id="id_pembiayaan">
                      <option selected>PILIH</option>
                      @foreach($dataPembiyaan as $value)
                        <option value="{{$value->id_pembiyaan}}">{{$value->jenis_pembiyaan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection