<?php
include '../conn/koneksi.php';

$id= $_GET['id'];
$query = mysqli_query($konek,"DELETE FROM tbl_buku WHERE id='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";
	}


?>