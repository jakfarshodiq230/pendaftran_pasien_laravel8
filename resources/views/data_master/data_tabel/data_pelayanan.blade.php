<table class="table table-borderless datatable">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Jenis Pelayanan</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if(count($data) > 0)
        <?php $no=1; ?>
        @foreach($data as $value)
        <tr>
            <th scope="row">{{$no++}}</th>
            <td>{{$value->jenis_pelayanan}}</td>
            <td>
                <!-- Vertically centered Modal -->
                <a href="javascript:void(0)" id="btn-edit-post2" data-id="{{ $value->id_pelayanan }}" class="btn btn-primary btn-sm">EDIT</a>
                <a class="btn btn-danger" href="/data-master/pelayanan/delete/{{$value->id_pelayanan}}">Hapus</a>
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
<div class="modal fade" id="modal-edit2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('pelayanan.simpanEdit') }}" method="post">
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
                                <input type="hidden" class="form-control" name="id_pelayanan2" id="id_pelayanan2">
                                <input type="text" class="form-control" name="jenis_pelayanan2" id="jenis_pelayanan2">
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
    $('body').on('click', '#btn-edit-post2', function () {
        let post_id2 = $(this).data('id');
        //fetch detail post with ajax
        $.ajax({
            url: '/data-master/pelayanan/edit/'+post_id2,
            type: "GET",
            cache: false,
            success:function(response){
                //console.log(response.data.jenis_registrasi);
                //fill data to form
                $('#jenis_pelayanan2').val(response.data.jenis_pelayanan);
                $('#id_pelayanan2').val(response.data.id_pelayanan);

                //open modal
                $('#modal-edit2').modal('show');
            }
        });
    });
</script>