   <?php
   include '../conn/koneksi.php';
   include 'transaksi_fungsi.php';
   ?>
 
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
  	$(document).ready(function() {
     $('#example').DataTable();
  } );
 </script>
   <style>
	   #menu_header{
		   margin-bottom: 10px;
	   }
   </style>
   <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu"><b>Data Transaksi</b></div><br>
    	<div id="content_menu">
        <div id="menu_header">
        	<form action="?page=transaksi_search" method="post">
				<table width="100%">
					<tr>
						<td width="75%"><a class="btn btn-sm btn-success" href="?page=transaksi_input">Input Transaksi</a></td>
					</tr>
				</table>
			</form>
    	</div>
		
		<div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered" align="center" cellspacing="0" cellpadding="5">
              <thead align="center">
              <tr>
                <th align="center" width="5%" >No</th>
                <th  width="20%">Judul Buku</th>
                <th  width="20%">Peminjam</th>
                <th  width="15%">Tgl Pinjam</th>
                <th  width="15%">Tgl Kembali</th>
                <th  width="10%">Terlambat</th>
                <th  width="20%">Tindakan</th>
              </tr>
            </thead>
            <?php
        $query = "SELECT * FROM tbl_transaksi WHERE status='Pinjam' ORDER by id";
        $sql = mysqli_query($konek,$query);
        $total = mysqli_num_rows($sql);
        $no = 1;
        
        while ($data=mysqli_fetch_array($sql)) {
      ?>
            
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo $data['judul']; ?></a></td>
                <td><?php echo $data['nama']; ?></td>
                <td align="center"><?php echo $data['tgl_pinjam']; ?></td>
                <td align="center"><?php echo $data['tgl_kembali']; ?></td>
                <td align="center">
                <?php
          $tgl_dateline=$data['tgl_kembali'];
          $tgl_kembali=date('d-m-Y');
          $lambat=terlambat($tgl_dateline, $tgl_kembali);
          $denda=$lambat*$denda1;
          if ($lambat>0) {
            echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
          }
          else {
            echo $lambat." hari";
          }
        ?>
                
                </td>
                <td align="center">
                  <a class="btn btn-sm btn-primary" href="?page=transaksi_proses_kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>">kembali</a>
                  <a class="btn btn-sm btn-danger" href="?page=transaksi_proses_perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'];?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>">perpanjang</a>
              </td>
              </tr>              
            <?php $no++; } ?>
            </table>
          </div>
   	  </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">