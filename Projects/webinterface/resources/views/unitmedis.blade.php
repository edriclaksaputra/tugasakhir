@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Unit Medis</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('alert'))
                            <div class="alert alert-success">
                                <h4> {{ session('alert') }} </h4>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-info">
                                <h4> {{ session('error') }} </h4>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List Unit Medis
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1" style="text-align: center">No.</th>
                                                <th style="text-align: center">No. Unit Medis</th>
                                                <th style="text-align: center">Unit Medis</th>
                                                <th style="text-align: center">Group</th>
                                                <th class="col-lg-2" style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listunitmedis as $unitmedisdetail)
                                            <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                                    <td style="text-align: center">{{$unitmedisdetail->systemid}}</td>
                                                    <td style="text-align: center">{{$unitmedisdetail->workunit_name}}</td>
                                                    <td style="text-align: center">{{$unitmedisdetail->wugroup->groupname}}</td>
                                                    <td style="text-align: center"><button type="button" class="btn btn-danger" name="result" value="cancel" data-toggle="modal" data-target="#cancel" onclick="hapusunitmedis('{{$unitmedisdetail->systemid}}', '{{$unitmedisdetail->workunit_name}}')">Hapus</button></td>
                                                    <input type="hidden" name="jenis" value="penjualan">
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row col-lg-12">
                                        <div class="col-lg-6 text-left">
                                            <a href="medicalunit.unitbaru" style="text-decoration: none"><button type="button" class="btn btn-info">Unit Baru</button></a>
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
                                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan meng-hapus unit medis <label id="namaunit"></label>?
                            </div>
                            <div class="modal-footer">
                                <form action="/medicalunit.hapusunitmedis" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                    <input type="hidden" id="jenis" name="jenis">
                                    <input type="hidden" id="idunitmedis" name="idunitmedis">
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
    function hapusunitmedis(nounitmedis, namaunitmedis) {
        document.getElementById('idunitmedis').value = nounitmedis;
        document.getElementById('namaunit').innerHTML = namaunitmedis;
    }
</script>