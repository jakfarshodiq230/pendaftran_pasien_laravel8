@extends('template.master')
@section('content')

    <div class="pagetitle">
    <h1>Data Master</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Data Master</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Rigestasi</button>
                    </li>

                    <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pelayanan</button>
                    </li>

                    <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Pembiayaan</button>
                    </li>

                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview pt-3" id="profile-overview">
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                <h5 class="card-title">Data <span>| Regestrasi</span></h5>
                                 <!-- Vertically centered Modal -->
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Regestrasi">
                                    Tambah Regestrasi
                                </button>
                                <div class="modal fade" id="Regestrasi" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('registrasi.save') }}" method="post">
                                            {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Regestrasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- General Form Elements -->
                                                        <div class="row mb-3">
                                                            <label for="inputText" class="col-sm-4 col-form-label">Jenis Regestrasi</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="jenis_registrasi" id="jenis_registrasi"  required="required">
                                                            </div>
                                                        </div>
                                                    <!-- End General Form Elements -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertically centered Modal-->
                                <div class="table-responsive" id="area_tabel"></div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                <h5 class="card-title">Data <span>| Pelayanan</span></h5>
                                 <!-- Vertically centered Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Pelayanan">
                                    Tambah Pelayanan
                                </button>
                                <div class="modal fade" id="Pelayanan" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('pelayanan.save') }}" method="post">
                                            {{ csrf_field() }}>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Pelayanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- General Form Elements -->
                                                        <div class="row mb-3">
                                                            <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelayanan</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="jenis_pelayanan" id="jenis_pelayanan"  required="required">
                                                            </div>
                                                        </div>
                                                    <!-- End General Form Elements -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertically centered Modal-->
                                <div class="table-responsive" id="tabel_pelayanan"></div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-settings">
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                <h5 class="card-title">Data <span>| Pembiayaan</span></h5>
                                <!-- Vertically centered Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Pembiayaan">
                                    Tambah Pembiayaan
                                </button>
                                <div class="modal fade" id="Pembiayaan" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('pembiyaan.save') }}" method="post">
                                            {{ csrf_field() }}>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Pembiayaan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- General Form Elements -->
                                                        <div class="row mb-3">
                                                            <label for="inputText" class="col-sm-4 col-form-label">Jenis Pembiayaan</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="jenis_pembiyaan" id="jenis_pembiyaan"  required="required">
                                                            </div>
                                                        </div>
                                                    <!-- End General Form Elements -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertically centered Modal-->
                                <div class="table-responsive" id="tabel_pembiyaan"></div>

                                </div>

                            </div>
                        </div>
                    </div>


                </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
    </section>
<script>
     $(window).on("load", function() { //otomatis aktif ketika page di refresh
		reload_table(); //fungsi untuk load table
        tabel_pelayanan();
        tabel_pembiyaan();
	});

    $(function() { //otomatis aktif ketika page di jalankan
        //fungsi untuk load csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //fungsi untuk load tabel registasi
    window.reload_table = function() {
        var url = "{{ route('data.registrasi') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#area_tabel").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#area_tabel").html(val['data']);
            }
        });
    }

    window.tabel_pelayanan = function() {
        var url = "{{ route('data.pelayanan') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#tabel_pelayanan").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#tabel_pelayanan").html(val['data']);
            }
        });
    }

    window.tabel_pembiyaan = function() {
        var url = "{{ route('data.pembiyaan') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#tabel_pembiyaan").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#tabel_pembiyaan").html(val['data']);
            }
        });
    }

</script>
@endsection
<!-- End #main -->