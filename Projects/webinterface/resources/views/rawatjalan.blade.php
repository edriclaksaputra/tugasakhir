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
                                                <th>Asuransi</th>
                                                <th>No. RM</th>
                                                <th>Usia</th>
                                                <th>Unit Medis</th>
                                                <th>Poli</th>
                                                <th>Waktu Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX" style="background-color: #F5FFFA">
                                                <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <td style="text-align: center">1</td>
                                                    <td style="text-align: center">000078162</td>
                                                    <td style="text-align: center">Yayat Saepudin</td>
                                                    <td style="text-align: center">BPJS Kesehatan</td>
                                                    <td style="text-align: center">000255148</td>
                                                    <td style="text-align: center">48 Tahun</td>
                                                    <td style="text-align: center">dr. Nadia Ayu</td>
                                                    <td style="text-align: center">IGD</td>
                                                    <td style="text-align: center">19-Jun-2018</td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan meng-hapus record data pasien ?
                            </div>
                            <div class="modal-footer">
                                <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                    <input type="hidden" id="jenis" name="jenis">
                                    <input type="hidden" id="idtransaksi" name="idtransaksi">
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