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
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Unit Medis Baru
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="panel-heading col-lg-2">
                                        Kelompok Medis
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="stokbarang">
                                            <option>Penyakit Dalam</option>
                                            <option>Anak</option>
                                            <option>Gigi</option>
                                            <option>Umum</option>
                                            <option>Mata</option>
                                            <option>Syaraf</option>
                                            <option>Bedah</option>
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
                                        <textarea rows="3" cols="50"></textarea>
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
                                    <div class="col-lg-2">
                                        <input type="text" id="namadokter" name="namadokter" readonly>
                                    </div>
                                    <br><br>
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th class="col-lg-1">No.</th>
                                                        <th>Unit Medis</th>
                                                        <th>Group</th>
                                                        <th class="col-lg-2">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                        <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                            <td style="text-align: center">1</td>
                                                            <td style="text-align: center">dr. Yedi Suyadi, Sp.PD, MM.</td>
                                                            <td style="text-align: center">Penyakit Dalam</td>
                                                            <td style="text-align: center"><button type="button" class="btn btn-success" onclick="inputdokter('Edric Laksa')">Pilih</button></td>
                                                            <input type="hidden" name="jenis" value="penjualan">
                                                            <input type="hidden" name="idtransaksi" value=a>
                                                        </form>
                                                    </tr>
                                                    <tr class="odd gradeX" style="background-color: #FFEBCD">
                                                        <form action="/validasitransaksi.validasi" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                            <td style="text-align: center">2</td>
                                                            <td style="text-align: center">dr. Yanwar Adithia, Sp.PD, MM.</td>
                                                            <td style="text-align: center">Anak</td>
                                                            <td style="text-align: center"><button type="button" class="btn btn-success" onclick="inputdokter('Yanwar Adithia')">Pilih</button></td>
                                                            <input type="hidden" name="jenis" value="penjualan">
                                                            <input type="hidden" name="idtransaksi" value=a>
                                                        </form>
                                                    </tr>
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
                    <div class="col-lg-10">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Anggota dalam Unit
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <form role="role" method="post" action="inputorder">
                                        {{ csrf_field() }}
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="col-lg-1">No.</th>
                                                    <th class="col-lg-3">Nama Dokter</th>
                                                    <th class="col-lg-3">Group</th>
                                                </tr>
                                            </thead>
                                            <tbody class="form-group" id="tablebarangbeli">
                                                <!-- Diisi lewat JavaScript -->
                                            </tbody>
                                        </table>
                                    </form>
                                    <br><br>
                                        <div class="alert alert-warning">
                                        <strong>List Dokter</strong>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th class="col-lg-1">No.</th>
                                                    <th>Unit Medis</th>
                                                    <th>Group</th>
                                                    <th class="col-lg-2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <input type="hidden" id="detailbarang_id1" name="detailbarang_id" value=1>
                                                    <td><label id="nama1">dr. Yedi Suyadi, Sp.PD, MM.</label></td>
                                                    <td><label id="harga1">Penyakit Dalam</td>
                                                    <td class="center"><button type="button" class="btn btn-info fa fa-plus" onclick="addBarangBeli(document.getElementById('nama1').innerHTML, document.getElementById('harga1').innerHTML)">Add</button></td>
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
<script>
    function inputdokter(namadokter){
        document.getElementById("namadokter").value = namadokter;
    }
</script>
<script>
    var counter = 0;
    var total = 0;
    function addBarangBeli(namaBarang,harga,detailbarang_id){
        var table = document.getElementById('tablebarangbeli');
        var row = table.insertRow(counter);

        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);

        cell0.innerHTML = counter+1;
        cell1.innerHTML = '<label>'+namaBarang+'</label><input type="hidden" name="detailbarang_id'+counter+'" value="'+detailbarang_id+'"><input type="hidden" name="counter" value="'+counter+'">';
        cell2.innerHTML = '<label>'+harga+'</label><input type="hidden" name="hargabarang'+counter+'" value="'+harga+'">';

        total = total+(harga*banyak);
        var totalbelanja = document.getElementById('totalbelanja');
        totalbelanja.innerHTML = total;

        var belanjatotal = document.getElementById('belanjatotal');
        belanjatotal.value = total;

        counter++;
    }
</script>