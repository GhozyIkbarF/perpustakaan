<?php 
	include '../conn/koneksi.php';
    $id		= $_GET['id'];
        require 'buku_proses.php';
        if (isset($_POST['simpan'])){
            if(ubah($_POST) > 0){
                echo "<script> alert('Data Berhasil Di Update') </script>";
	            echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";	
            } else {
                echo "<script> alert('Data Gagal Di Input') </script>";
	            echo "<meta http-equiv='refresh' content='0; url=?page=edit-buku&id=$id'>";
                echo mysqli_error($konek);
            }
        }

	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');
	$waktu = $tanggal.' '.$jam;
	
	$query = "SELECT * FROM tbl_buku WHERE id=$id";
	$sql = mysqli_query($konek,$query);
	$data = mysqli_fetch_array($sql);
	$id = $data['id'];
	$lokasi = $data['lokasi'];
    $keterangan = $data['keterangan']
?>
<style>
         #menu_header{
         margin-bottom: 10px;
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
	<div style="background-color: #fff; padding: 15px; height:  680px;" id="menu-tengah">
    	<div id="content_menu"><b>Edit buku</b></div>
           <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                
                            <!-- </div> -->
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 15px;" action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                                    <input type="hidden" name="tgl_input" value="<?= $data['tgl_input'] ?>"  />
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                        <div class="col-sm-8">
                                            <input name="judul" type="text" id="judul" value="<?= $data['judul'] ?>" class="form-control" autocomplete="off" placeholder="Judul Buku" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                        <div class="col-sm-8">
                                            <input name="pengarang" type="text" id="pengarang" value="<?= $data['pengarang'] ?>" class="form-control" autocomplete="off" placeholder="Pengarang" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                        <div class="col-sm-8">
                                            <input name="thn_terbit" type="text" id="thn_terbit" value="<?= $data['thn_terbit'] ?>" class="form-control" autocomplete="off" placeholder="Tahun Terbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input name="penerbit" type="text" id="penerbit" value="<?= $data['penerbit'] ?>" class="form-control" autocomplete="off" placeholder="Penerbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
                                        <div class="col-sm-8">
                                            <input name="isbn" type="text" id="isbn" value="<?= $data['isbn'] ?>" class="form-control" autocomplete="off" placeholder="ISBN" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Halaman</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_halaman" type="text" id="jumlah_halaman" value="<?= $data['jumlah_halaman'] ?>" class="form-control" autocomplete="off" placeholder="Jumlah Halaman" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">keterangan</label>
                                        <div class="col-sm-8">
                                            <textarea name="keterangan" type="text" id="keterangan"  class="form-control" autocomplete="off"  required> <?= $keterangan ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_buku" type="text" id="jumlah_buku" value="<?= $data['jumlah_buku'] ?>" class="form-control" autocomplete="off" placeholder="Jumlah Buku" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="lokasi" id="lokasi" required>
                                                <option value=""> -- Pilih Salah Satu --</option>
                                                <option value="rak 1" <?php if( $lokasi=='rak 1'){echo "selected"; } ?>>Rak 1</option>
                                                <option value="rak 2" <?php if( $lokasi=='rak 2'){echo "selected"; } ?>>Rak 2</option> 
                                                <option value="rak 3" <?php if( $lokasi=='rak 3'){echo "selected"; } ?>>Rak 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <img src="../images/<?= $data['gambar']?>" width="80" height="60">
                                            <input name="gambar" id="gambar" type="file" value="<?= $data['gambar']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" name="simpan" value="simpan" class="btn btn-sm btn-primary">&nbsp;
                                            <a href="?page=buku" class="btn btn-sm btn-danger">Batal </a>
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
    
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">