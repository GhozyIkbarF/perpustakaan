<?php 
	include '../conn/koneksi.php';
	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');
	$waktu = $tanggal.' '.$jam;

    require 'buku_proses.php';
        if (isset($_POST['Tambah'])){
            if(tambah() > 0){
                echo "<script>
                alert('Buku berhasil ditambahkan')
            </script>";
            } else {
                echo "<script>
                alert('buku gagal ditambahkan')
            </script>";
                echo mysqli_error($konek);
            }
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

 <style>
     #menu_header{
         margin-bottom: 20px;
     }
     .form-group{
         display: flex;
         flex-direction: row;
         margin-bottom: 15px;
     }
     .form-group{
         padding-left: 80px;
         font-size: 15px;
     }
     .form-group label{
         margin: 0;
         display: flex;
         align-items:center;
         font-weight: bold;
         justify-content: right;
         padding-right: 20px;
     }
 </style>
<!-- menu tengah -->
<body>
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<!-- <div id="bg_menu">Data Buku
    	</div> -->
    	<div id="content_menu">
            <div id="menu_header">
                        <b align="center">Input Buku</b>      
            </div>
           <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 15px;" action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="tgl_input" value="<?php echo $waktu; ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                        <div class="col-sm-8">
                                            <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                        <div class="col-sm-8">
                                            <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off"  required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                        <div class="col-sm-8">
                                            <input name="thn_terbit" type="text" id="thn_terbit" class="form-control" autocomplete="off"  required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input name="penerbit" type="text" id="penerbit" class="form-control" autocomplete="off"  required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
                                        <div class="col-sm-8">
                                            <input name="isbn" type="text" id="isbn" class="form-control" autocomplete="off"  required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Halaman</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_halaman" type="text" id="jumlah_halaman" class="form-control" autocomplete="off"  required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">keterangan</label>
                                        <div class="col-sm-8">
                                            <textarea name="keterangan" type="text" id="keterangan" class="form-control" autocomplete="off"  required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_buku" type="text" id="jumlah_buku" class="form-control" autocomplete="off"  required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="lokasi" id="lokasi" required>
                                                <option value=""> -- Pilih Salah Satu --</option>
                                                <option value="rak 1"> rak 1</option>
                                                <option value="rak 2"> rak 2</option>
                                                <option value="rak 3"> rak 3</option>
                                            </select>
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
                                            <input type="submit" name="Tambah" value="Tambah" class="btn btn-sm btn-primary">&nbsp;<a href="?page=buku" class="btn btn-sm btn-danger">Batal</a>
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
    </body>