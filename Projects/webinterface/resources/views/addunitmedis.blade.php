@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Unit Medis Baru</h1>
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
                <form action="/medicalunit.unitbaru.unitbaruadd" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Unit Medis Baru
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Kelompok Medis
                                        </div>
                                        <div class="col-lg-3">
                                            <select class="form-control" name="idkelmedis">
                                                @foreach($listwugroup as $wugroupdetail)
                                                <option value="{{$wugroupdetail->systemid}}">{{$wugroupdetail->groupname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Nama Unit Medis
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="namaunitmedis">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Keterangan
                                        </div>
                                        <div class="col-lg-2">
                                            <textarea rows="3" cols="50" name="keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Dokter Penanggung Jawab
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Penanggung Jawab :
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="col-lg-12" type="text" id="namadokter" name="namadokterpj" readonly style="text-align: center">
                                        </div>
                                        <br><br>
                                        <div class="col-lg-8">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-lg-1">No.</th>
                                                            <th>Dokter</th>
                                                            <th class="col-lg-2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($listdokter as $dokterdetail)
                                                        <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                            <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                <td style="text-align: center">{{$loop->iteration}}</td>
                                                                <td style="text-align: center">{{$dokterdetail->prefixtitle}} {{$dokterdetail->firstname}} {{$dokterdetail->suffixtitle}}</td>
                                                                <td style="text-align: center"><button type="button" class="btn btn-success" onclick="inputdokter('{{$dokterdetail->prefixtitle}} {{$dokterdetail->firstname}} {{$dokterdetail->suffixtitle}}')">Pilih</button></td>
                                                            </form>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel-heading col-lg-2">
                            <button type="submit" class="btn btn-success">Input Baru</button>
                        </div>
                    </div> 
                </form>           
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
    function inputdokter(namadokter){
        document.getElementById("namadokter").value = namadokter;
    }
</script>