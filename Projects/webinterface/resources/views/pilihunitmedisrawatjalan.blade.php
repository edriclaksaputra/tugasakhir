@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Unit Medis</h1>
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
                <form action="/rawatjalan.inputantrian" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    List Unit Medis
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Unit Medis :
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="col-lg-12" type="text" id="namaunitmedis" name="namaunitmedis" readonly style="text-align: center">
                                            <input type="hidden" id="idunitmedis" name="idunitmedis" value="">
                                            <input type="hidden" name="idpasien" value="{{$idpasien}}">
                                        </div>
                                        <br><br>
                                        <div class="col-lg-8">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-lg-1">No.</th>
                                                            <th>Nama Unit Medis</th>
                                                            <th>Spesialis</th>
                                                            <th class="col-lg-2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($listunitmedis as $unitmedisdetail)
                                                        <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                            <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                <td style="text-align: center">{{$loop->iteration}}</td>
                                                                <td style="text-align: center">{{$unitmedisdetail->workunit_name}}</td>
                                                                <td style="text-align: center">{{$unitmedisdetail->wugroup->groupname}}</td>
                                                                <td style="text-align: center"><button type="button" class="btn btn-success" onclick="inputunitmedis('{{$unitmedisdetail->workunit_name}}', '{{$unitmedisdetail->systemid}}')">Pilih</button></td>
                                                            </form>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Tanggal :
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="col-lg-12" type="text" id="tanggalhariini" name="tanggalhariini" readonly style="text-align: center">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-heading col-lg-2">
                                            Keluhan :
                                        </div>
                                        <div class="col-lg-4">
                                            <textarea rows="5" cols="55" name="keluhan"></textarea>
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
                            <button type="submit" class="btn btn-success">Input Antrian</button>
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
    function inputunitmedis(namaunitmedis, idunitmedis){
        document.getElementById("namaunitmedis").value = namaunitmedis;
        document.getElementById("idunitmedis").value = idunitmedis;
    }
</script>
<script>
    var d = new Date().toISOString().slice(0,10);
    document.getElementById("tanggalhariini").value = d;
</script>