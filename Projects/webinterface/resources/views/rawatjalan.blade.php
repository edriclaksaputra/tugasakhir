@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Antrian Pasien Rawat Jalan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('alert'))
                            <div class="alert alert-success">
                                <h4> {{ session('alert') }} </h4>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-info">
                                <h4> {{ session('error') }} </h4>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List Dokter
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Registrasi</th>
                                                <th>Pasien</th>
                                                <th>Unit Medis</th>
                                                <th>Waktu Masuk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listrawatjalan as $rawatjalandetail)
                                            <tr class="odd gradeX" style="background-color: #F5FFFA">
                                                <form action="/rawatjalan.hapusantrian" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                                    <td style="text-align: center">{{$rawatjalandetail->regis_no}}</td>
                                                    <td style="text-align: center">{{$rawatjalandetail->hcustomer}}</td>
                                                    <td style="text-align: center">{{$rawatjalandetail->workunit_name}}</td>
                                                    <td style="text-align: center">{{$rawatjalandetail->waktudaftar}}</td>
                                                    <td style="text-align: center"><button type="button" class="btn btn-warning" name="result" value="cancel" data-toggle="modal" data-target="#cancel" onclick="cancelantrian('{{$rawatjalandetail->regis_no}}')">Selesai</button></td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row col-lg-12">
                                        <div class="col-lg-6 text-left">
                                            <a href="rawatjalan.tambahantrian" style="text-decoration: none"><button type="button" class="btn btn-info">Tambah Antrian Baru</button></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- Modal -->
                <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Hapus Antrian</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan meng-hapus antrian rawat jalan <label id="noregis"></label> ?
                            </div>
                            <div class="modal-footer">
                                <form action="/rawatjalan.hapusantrian" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                    <input type="hidden" id="noregishapus" name="noregishapus">
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
@include('layouts.footer')

<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#uploadphoto')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    function cancelantrian(noregis) {

        document.getElementById('noregishapus').value = noregis;
        document.getElementById('noregis').innerHTML = noregis;
    }
</script>