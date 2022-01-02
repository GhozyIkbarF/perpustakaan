<?php
include 'conn/koneksi.php';
$pinjam			= date("d-m-Y");
$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali		= date("d-m-Y", $tuju_hari);
?>
<!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu"><b>Input Transaksi</b></div>
    	<div id="content_menu">
		   <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 15px;" action="?page=transaksi_proses" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Judul buku</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="buku" id="buku" required>
												<option value="">Pilih Judul Buku</option>
													<?php
														$query = "SELECT * FROM tbl_buku ORDER by id";
														$sql = mysqli_query($konek,$query);
														while ($buku=mysqli_fetch_array($sql)) {
															echo "<option value='$buku[0].$buku[1]'>$buku[1]</option>";
														}
														
													?>
                                            </select>
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama peminjam</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="peminjam" id="peminjam" required>
												<option value="">Pilih Peminjam</option>
													<?php 		
                                                        session_start();
                                                        $id = $_SESSION['id'];
                                                        if( $_SESSION['level']== 'admin'){
                                                            $query = "SELECT * FROM tbl_user where level='user'";
                                                            $sql = mysqli_query($konek,$query);
                                                            while ($nama=mysqli_fetch_array($sql)) {
															echo "<option value='$nama[0].$nama[1]'>$nama[0]. $nama[1]</option>";}
                                                        }else{									
                                                            $query = "SELECT * FROM tbl_user where id='$id'";
                                                            $sql = mysqli_query($konek,$query);
                                                            while ($nama=mysqli_fetch_array($sql)) {
															echo "<option value='$nama[0].$nama[1]'>$nama[0]. $nama[1]</option>";}
														}
														
													
													?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal pinjam</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_pinjam" type="text" id="tgl_pinjam" value="<?php echo $pinjam; ?>" class="form-control" autocomplete="off"  readonly="readonly" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal kembali</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_kembali" type="text" id="tgl_pinjam" value="<?php echo $kembali; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                        <div class="col-sm-8">
                                            <input name="ket" type="text" id="ket" class="form-control" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">&nbsp;
                                            <?php 
                                                session_start();
                                                $id = $_SESSION['id'];
                                                $query = "SELECT * FROM tbl_user where id=$id";
												$sql = mysqli_query($konek,$query);
                                                $data = mysqli_fetch_assoc($sql);
                                                        

                                                if($data['level'] == 'admin'){
                                                    echo"<a href='?page=transaksi' class='btn btn-sm btn-danger'>Batal</a>";
                                                }else{
                                                    echo"<a href='?page=transaksiguest' class='btn btn-sm btn-danger'>Batal</a>";
                                                }
                                                
                                            ?>
                                            <!-- <a href="?page=transaksi" class="btn btn-sm btn-danger">Batal</a> -->
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