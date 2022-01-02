<?php 
	include '../conn/koneksi.php';

    require 'user_proses.php';
        if (isset($_POST['Tambah'])){
            if(register() > 0){
                echo "<script>
                alert('Anggota berhasil ditambahkan')
            </script>";
            } else {
                echo "<script>
                alert('Anggota gagal ditambahkan')
            </script>";
                echo mysqli_error($konek);
            }
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<body>
   <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu">Data User</div>
    	<div id="content_menu">
    
           <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 15px;" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input name="email" type="text" id="email" class="form-control" autocomplete="off" placeholder="Email" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="nama" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Username</label>
                                        <div class="col-sm-8">
                                            <input name="username" type="text" id="username" class="form-control" autocomplete="off" placeholder="Username" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input name="password" type="password" id="password" class="form-control" autocomplete="off" placeholder="Password" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
                                        <div class="col-sm-8">
                                            <input name="konfirmasi" type="password" id="konfirmasi" class="form-control" autocomplete="off" placeholder="Konfirmasi password" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jenis kelamin</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="jns_kelamin" id="jns_kelamin" required>
                                                <option value=""> -- Pilih Salah Satu --</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tempat lahir</label>
                                        <div class="col-sm-8">
                                            <input name="tmp_lahir" type="text" id="tmp_lahir" class="form-control" autocomplete="off" placeholder="Tempat lahir" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal lahir</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_lahir" type="text" id="getdate" class="form-control" autocomplete="off" placeholder="Tanggal lahir" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" placeholder="Alamat" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <input name="gambar" id="gambar" type="file" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" name="Tambah" value="Tambah" class="btn btn-sm btn-primary">&nbsp;<a href="?page=user" class="btn btn-sm btn-danger">Batal</a>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
                            </div>
                        </div><!-- /.box -->
                    </div>
                </div>
                <!-- row end -->
            </section>
   	  </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
  	$(document).ready(function() {
     $('#getdate').datepicker({
     	changeMonth:true,
     	changeYear:true,
     	dateFormat:"yy-mm-dd",
     	yearRange:"1960:2022"
     });

  	} );
</script>
</body>