@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Dokter</h1>
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
                                                <th class="col-lg-2">Nomor Induk</th>
                                                <th>Nama</th>
                                                <th>Spesialis</th>
                                                <th>Telp. Rumah</th>
                                                <th class="col-lg-2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX" style="background-color: #FAFAD2">
                                                <form action="/hr.detaildokter" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <td style="text-align: center">000078162</td>
                                                    <td style="text-align: center">Prof Dr Dedi Rachmadi, dr Sp.A</td>
                                                    <td style="text-align: center">Pediatrics</td>
                                                    <td style="text-align: center">081221450722</td>
                                                    <td style="text-align: center"><button type="submit" class="btn btn-success" name="result" value="accept">Tampilkan/Ubah</button>   <button type="button" class="btn btn-danger" name="result" value="cancel" data-toggle="modal" data-target="#cancel" onclick="hapusdokter('000078162', 'Prof Dr Dedi Rachmadi, dr Sp.A')">Hapus</button></td>
                                                    <input type="hidden" name="noinduk" value="000078162">
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
                                Apakah anda yakin akan meng-hapus record data <label id="namadokter"></label> ?
                            </div>
                            <div class="modal-footer">
                                <form action="/hr.deletedokter" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                    <input type="hidden" id="iddokter" name="iddokter">
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
    function hapusdokter(noindukdokter, namadokter) {

        document.getElementById('iddokter').value = noindukdokter;
        document.getElementById('namadokter').innerHTML = namadokter;
    }
</script>