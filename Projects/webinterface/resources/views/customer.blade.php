@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Pasien</h1>
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
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List Pasien
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-2">No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Tanggal Registrasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listpasien as $pasiendetail)
                                            <tr class="odd gradeX" style="background-color: #F0F8FF ">
                                                <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                                    <td style="text-align: center">{{$pasiendetail->firstname}}</td>
                                                    @if($pasiendetail->gender == 0)
                                                    <td style="text-align: center">Wanita</td>
                                                    @else
                                                    <td style="text-align: center">Pria</td>
                                                    @endif

                                                    @if($pasiendetail->maritalstatus == 0)
                                                    <td style="text-align: center">Belum Menikah</td>
                                                    @else
                                                    <td style="text-align: center">Sudah Menikah</td>
                                                    @endif
                                                    <td style="text-align: center">{{$pasiendetail->registrationdate}}</td>
                                                </form>
                                            </tr>
                                            @endforeach
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
<script>
    var d = new Date();
    document.getElementById("todaydate").value = d.toDateString();
</script>