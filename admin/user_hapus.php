<?php
include '../conn/koneksi.php';

$id= $_GET['id'];
$query = mysqli_query($konek,"DELETE FROM tbl_user WHERE id='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
	}


?>