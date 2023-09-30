@extends('template.master')
@section('content')
<div class="pagetitle">
      <h1>Data Pasien</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pasien</li>
          <li class="breadcrumb-item active">List Data Pasien</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pasien</h5>
                <div class="table-responsive">
                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Waktu Registrasi</th>
                            <th scope="col">No Regestrasi</th>
                            <th scope="col">No Rekam Medis</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Registrasi</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Jenis Pembiyaan</th>
                            <th scope="col">Status Registrasi</th>
                            <th scope="col">Waktu Mulai Registrasi</th>
                            <th scope="col">Waktu Selesai Registrasi</th>
                            <th scope="col">Petugas Pendaftaran</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($dataRegistrasiPasien) > 0)
                            <?php $no=1; ?>
                            @foreach($dataRegistrasiPasien as $value)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{date('d/m/Y H:i', strtotime($value->waktu_regestrasi))}}</td>
                                <td>{{$value->no_regestrasi}}</td>
                                <td>{{$value->no_rekam_medis}}</td>
                                <td>{{$value->nama_pasien}}</td>
                                <td>{{$value->jenis_kelamin}}</td>
                                <td>{{$value->tanggal_lahir}}</td>
                                <td>{{$value->jenis_registrasi}}</td>
                                <td>{{$value->jenis_pelayanan}}</td>
                                <td>{{$value->jenis_pembiyaan}}</td>
                                <td>{{$value->status_regestrasi}}</td>
                                <td>{{date('d/m/Y H:i', strtotime($value->waktu_mulai_pelayanan))}}</td>
                                <td>{{ date('d/m/Y H:i a', strtotime($value->waktu_selesai_pelayanan))}}</td>
                                <td>{{$value->id_petugas}}</td>
                                <td>
                                    <!-- Vertically centered Modal -->
                                    <a class="btn btn-warning btn-sm" href="/data-pasien/selesai/{{$value->no_regestrasi}}">Selesai Kunjungan</a>
                                    <a class="btn btn-primary btn-sm" href="/data-pasien/edit/{{$value->no_regestrasi}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="/data-pasien/delete/{{$value->no_regestrasi}}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">Data tidak ada...</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    @endsection