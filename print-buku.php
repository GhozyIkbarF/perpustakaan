<html>
<body onLoad="window.print();">
   <?php
   include 'conn/koneksi.php';
   ?>

<style type="text/css">
body {
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.style1{
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;	
}
</style>

			<p align="center">LAPORAN DATA BUKU PERPUSTAKAAN INSAN PEMBANGUNAN</p>
   			<table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
   	    
   	          <tr>
   	            <td width="4%" height="34" align="center" bgcolor="#CCCCCC">No</td>
   	            <td width="21%" bgcolor="#CCCCCC" align="center">Judul Buku</td>
   	            <td width="16%" bgcolor="#CCCCCC" align="center">Pengarang</td>
   	            <td width="14%" bgcolor="#CCCCCC" align="center">Penerbit</td>
                <td width="15%" bgcolor="#CCCCCC" align="center">Tahun Terbit</td>
                <td width="15%" bgcolor="#CCCCCC" align="center">Kode ISBN</td>
   	            <td width="7%" bgcolor="#CCCCCC" align="center">Jumlah</td>
                <td width="8%" bgcolor="#CCCCCC" align="center">Lokasi</td>
              </tr>
            <?php
				$query = "SELECT * FROM tbl_buku ORDER by judul";
				$sql = mysqli_query($konek,$query);
				$total = mysqli_num_rows($sql);
				$no = 1;
				
				while ($data=mysqli_fetch_array($sql)) {
			?>
   	        <tbody>
   	          <tr>
   	            <td height="27" align="center"><?php echo $no; ?></td>
   	            <td align="center"><?php echo $data['judul']; ?></a>
   	            <td align="center"><?php echo $data['pengarang']; ?></td>
   	            <td align="center"><?php echo $data['penerbit']; ?></td>
                <td align="center"><?php echo $data['thn_terbit']; ?></td>
                <td align="center"><?php echo $data['isbn']; ?></td>
                <td align="center"><?php echo $data['jumlah_buku']; ?></td>
               	<td align="center"><?php echo $data['lokasi']; ?></td>
                
              </tr>
            <?php $no++; } ?>
            
            </tbody>
          </table>

</body>