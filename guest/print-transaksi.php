<html>
<body onLoad="window.print();">
   <?php
   include '../conn/koneksi.php';
   ?>
   
		<p align="center">LAPORAN DATA ANGGOTA PERPUSTAKAAN INSAN PEMBANGUNAN</p>
   	      <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
   	       
   	          <tr>
   	            <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
   	            <th width="25%" align="center" class="style1" bgcolor="#CCCCCC">Judul Buku</th>
   	            <th width="19%" align="center" class="style1" bgcolor="#CCCCCC">Peminjam</th>
				<th width="11%" align="center" class="style1" bgcolor="#CCCCCC">Id Peminjam</th>
   	            <th width="15%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Pinjam</th>
   	            <th width="15%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Kembali</th>
                <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Status</th>
              </tr>

            <?php
				session_start();
				$id= $_SESSION['id'];
				$query = "SELECT * FROM tbl_transaksi where nim='$id'";
				$sql = mysqli_query($konek,$query);
				$no = 1;
				while ($data=mysqli_fetch_array($sql)) {
			?>
   	        <tbody>
   	          <tr>
   	            <td align="center"><?php echo $no; ?></td>
   	            <td><?php echo $data['judul']; ?></td>
   	            <td><?php echo $data['nama']; ?></td>
				<td align="center"><?php echo $data['nim']; ?></td>
   	            <td align="center"><?php echo $data['tgl_pinjam']; ?></td>
   	            <td align="center"><?php echo $data['tgl_kembali']; ?></td>  
   	            <td align="center"><?php echo $data['status']; ?></td>      
              </tr>    
            <?php $no++; } ?>
           
            </tbody>
          </table>
</body>
</html>