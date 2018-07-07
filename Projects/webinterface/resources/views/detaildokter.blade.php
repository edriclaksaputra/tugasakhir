@include('layouts.header')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Prof Dr Dedi Rachmadi, dr Sp.A  </h1>
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
                                Detail Dokter
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="panel-heading col-lg-2">
                                        No. Induk :
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="namaunitmedis" readonly value="000078162" style="text-align: center">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="panel-heading col-lg-2">
                                        Spesialis :
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="namaunitmedis" readonly value="Pediatrics" style="text-align: center">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="panel-heading col-lg-2">
                                        Kontak :
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="namaunitmedis" readonly value="081221450722" style="text-align: center">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="panel-heading col-lg-2">
                                        <button type="button" class="btn btn-info"><a href="/hr" style="color: inherit;text-decoration: none">Kembali</a></button>
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
    function deletedokter(iddokter){
        console.log('cek');
    }
</script>