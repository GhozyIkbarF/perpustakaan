<?php include '../conn/koneksi.php'; ?>
<Style>
    .col-8 table tr{
        margin-bottom: 10px;
    }
</Style>
    <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu"><b>Detail Buku</b></div>
    	<div id="content_menu">
   	    <div class="table_input" >
           <div style="display: flex; justify-content: space-between; margin-top:10px" class="row">
                <div class="col-8 detailbook" style="width: 400px; ">
                    <table style="height: 380px;"  width="100%"  cellspacing="0" cellpadding="5">
                        <?php
                        $judul	= isset($_GET['judul']) ? $_GET['judul'] : "";
                        $query=mysqli_query($konek,"SELECT * FROM tbl_buku WHERE judul='$judul'");
                        $data=mysqli_fetch_assoc($query);
                        ?>        
                        
                            <tr >
                                <td width="35%" >Judul Buku</td>
                                <td >:</td>
                                <td ><?= $data['judul']; ?></td>
                            </tr>
                            <tr>
                                <td >Pengarang</td>
                                <td>:</td>
                                <td><?php echo $data['pengarang']; ?></td>
                            </tr>
                            <tr>
                                <td >Penerbit</td>
                                <td>:</td>
                                <td><?php echo $data['penerbit']; ?></td>
                            </tr>
                            <tr>
                                <td >Tahun Terbit</td>
                                <td>:</td>
                                <td><?php echo $data['thn_terbit']; ?></td>
                            </tr>
                            <tr>
                                <td >ISBN</td>
                                <td>:</td>
                                <td><?php echo $data['isbn']; ?></td>
                            </tr>
                            <tr>
                                <td >Jumlah Halaman</td>
                                <td width="2%">:</td>
                                <td ><?php echo $data['jumlah_halaman']; ?></td>
                            </tr>
                            <tr>
                                <td >Jumlah Buku</td>
                                <td >:</td>
                                <td><?php echo $data['jumlah_buku']; ?></td>
                            </tr>
                            
                            <tr>
                                <td >Lokasi</td>
                                <td>:</td>
                                <td><?php echo $data['lokasi']; ?></td>
                            </tr>
                            <tr>
                                <td >Tanggal Input</td>
                                <td>:</td>
                                <td><?php echo $data['tgl_input']; ?></td>
                            </tr>
                    </table>  
                </div>

                <div class="col-4">
                    <img src="../images/<?=$data['gambar']?>" style="width: 200px; height:200px; margin-bottom: 5px" >
                    <p style="width: 210px; font-size:12px"  ><?= $data['keterangan']; ?></p>
                </div>
            </div>

          <br>
          <a class="btn btn-sm btn-warning" href="?page=buku"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
 	      </div>
   	  </div>
    </div>
