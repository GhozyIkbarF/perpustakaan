<?php
session_start();
include "conn/koneksi.php";

$tgl_pinjam		= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";

$dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah_buku		= explode (".", $dapat_buku);
$id				= $pecah_buku[0];
$buku			= $pecah_buku[1];

$dapat_peminjam		= isset($_POST['peminjam']) ? $_POST['peminjam'] : "";
$pecah_peminjam		= explode (".", $dapat_peminjam);
$id_peminjam 		= $pecah_peminjam[0];
$peminjam		= $pecah_peminjam[1];

$ket			= isset($_POST['ket']) ? $_POST['ket'] : "";

if($buku == "") {
	echo "<script>alert('Pilih bukunya terlebih dahulu');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
} elseif ($peminjam == "" || $dapat_peminjam == "") {
	echo "<script>alert('Pilih peminjamnya terlebih dahulu');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
	
} else {
	$query=mysqli_query($konek,"SELECT * FROM tbl_buku WHERE judul = '$buku'");
	while ($hasil=mysqli_fetch_array($query)) {
		$sisa=$hasil['jumlah_buku'];
	} 
		if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	
	} else {
		$qt = mysqli_query($konek,"INSERT INTO tbl_transaksi VALUES (null, '$buku','$id_peminjam', '$peminjam', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', '$ket')") or die ("Gagal Masuk".mysqli_error());
		$qu	= mysqli_query($konek,"UPDATE tbl_buku SET jumlah_buku=(jumlah_buku-1) WHERE id=$id ");		
		if ($qt&&$qu) {
			if($_SESSION['level']=='admin'){
	        	echo "<script>alert('Transaksi Sukses');</script>";
	        	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
				exit;
			}else{
				echo "<script>alert('Transaksi Sukses');</script>";
	        	echo "<meta http-equiv='refresh' content='0; url=?page=transaksiguest'>";
				exit;
			}
		} else {
			echo "<script>alert('Transaksi Gagal');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
	
		}
	}
}
?>
