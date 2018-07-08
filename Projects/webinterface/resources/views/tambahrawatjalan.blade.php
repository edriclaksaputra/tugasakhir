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
                <form action="/rawatjalan.tambahantrian.pilihunitmedis" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Pasien
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Nama Pasien :
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="col-lg-12" type="text" id="namapasien" name="namapasien" readonly style="text-align: center">
                                            <input type="hidden" id="idpasien" name="idpasien">
                                        </div>
                                        <br><br>
                                        <div class="col-lg-8">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-lg-1">No.</th>
                                                            <th>No. Registrasi Pasien</th>
                                                            <th>Nama Pasien</th>
                                                            <th class="col-lg-2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($listpasien as $pasiendetail)
                                                        <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                            <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                <td style="text-align: center">{{$loop->iteration}}</td>
                                                                <td style="text-align: center">{{$pasiendetail->systemid}}</td>
                                                                <td style="text-align: center">{{$pasiendetail->firstname}}</td>
                                                                <td style="text-align: center"><button type="button" class="btn btn-success" onclick="inputdokter('{{$pasiendetail->firstname}}', '{{$pasiendetail->systemid}}')">Pilih</button></td>
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
                            <button type="submit" class="btn btn-success">Selanjutnya</button>
                        </div>
                    </div> 
                </form>
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
    function inputdokter(namapasien, idpasien){
        document.getElementById("namapasien").value = namapasien;
        document.getElementById("idpasien").value = idpasien;
    }
</script>