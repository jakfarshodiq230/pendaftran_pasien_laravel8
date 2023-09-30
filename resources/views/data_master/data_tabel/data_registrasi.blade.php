<table class="table table-borderless datatable">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Jenis Resgistrasi</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if(count($data) > 0)
        <?php $no=1; ?>
        @foreach($data as $value)
        <tr>
            <th scope="row">{{$no++}}</th>
            <td>{{$value->jenis_registrasi}}</td>
            <td>
                <!-- Vertically centered Modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditPembiayaan" data-id="">
                    Edit
                </button> -->
                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $value->id_registrasi }}" class="btn btn-primary btn-sm">EDIT</a>
                
                <a class="btn btn-danger" href="/data-master/resgistrasi/delete/{{$value->id_registrasi}}">Hapus</a>
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
<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('registrasi.simpanEdit') }}" method="post">
            {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pembiayaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- General Form Elements -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Jenis Pembiayaan</label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" name="id_registrasi2" id="id_registrasi2">
                                <input type="text" class="form-control" name="jenis_registrasi2" id="jenis_registrasi2">
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
<script>
    $('body').on('click', '#btn-edit-post', function () {
        let post_id = $(this).data('id');
        //fetch detail post with ajax
        //alert(post_id);
        $.ajax({
            url: '/data-master/resgistrasi/edit/'+post_id,
            type: "GET",
            cache: false,
            success:function(response){
                //console.log(response.data.jenis_registrasi);
                //fill data to form
                $('#jenis_registrasi2').val(response.data.jenis_registrasi);
                $('#id_registrasi2').val(response.data.id_registrasi);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
</script>