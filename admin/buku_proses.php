<?php
include '../conn/koneksi.php';

function tambah(){
	global $konek;

	$judul = htmlspecialchars($_POST['judul']);
	$pengarang = htmlspecialchars($_POST['pengarang']);
	$penerbit = htmlspecialchars($_POST['penerbit']);
	$tahun = htmlspecialchars($_POST['thn_terbit']);
	$isbn	= htmlspecialchars($_POST['isbn']);
	$jumlah_halaman = htmlspecialchars($_POST['jumlah_halaman']);
	$keterangan = htmlspecialchars($_POST['keterangan']);
	$jumlah = htmlspecialchars($_POST['jumlah_buku']);
	$lokasi = htmlspecialchars($_POST['lokasi']);
	$tgl_input = htmlspecialchars($_POST['tgl_input']);

	$result = mysqli_query($konek, "select judul from tbl_buku where judul='$judul'");

	if (mysqli_fetch_assoc($result)){
		echo "<script>
			alert('Buku sudah terdaftar')
		</script>";
		return false;
	}

	$gambar = upload();

	if($gambar){
		$query_insert = "insert into tbl_buku values (null,'$judul','$pengarang','$penerbit','$tahun','$isbn','$jumlah_halaman','$keterangan','$jumlah','$lokasi','$gambar','$tgl_input')";
		mysqli_query($konek, $query_insert);
	}

	return mysqli_affected_rows($konek);
}


function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if ($error == 4){
		echo "<script>
			alert('Gambar belum diupload');
		</script>";
		return false;
	}

	$ekstensiFile = ['jpeg', 'jpg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// cek ekstensi
	if(!in_array($ekstensiGambar, $ekstensiFile)){
		echo "<script>
			alert('Ekstensi harus jpeg jpg png');
		</script>";
		return false;
	} elseif($ukuranFile > 10000000){
		echo "<script>
			alert('Ukuran terlalu besar');
		</script>";
		return false;
	} else {
		$namaBaru = uniqid();
		$namaBaru .= ".";
		$namaBaru .= $ekstensiGambar;
		move_uploaded_file($tmpName, "../images/".$namaBaru);

		return $namaBaru;
	}
}

function ubah($data){
	global $konek;
	  
	$id = $data["id"];
		$judul = htmlspecialchars($data['judul']);
	  $pengarang = htmlspecialchars($data['pengarang']);
	  $penerbit = htmlspecialchars($data['penerbit']);
	  $tahun = htmlspecialchars($data['thn_terbit']);
	  $isbn	= htmlspecialchars($data['isbn']);
	  $jumlah_halaman = htmlspecialchars($data['jumlah_halaman']);
	  $keterangan = htmlspecialchars($data['keterangan']);
	  $jumlah = htmlspecialchars($data['jumlah_buku']);
	  $lokasi = htmlspecialchars($data['lokasi']);
	  $tgl_input = htmlspecialchars($data['tgl_input']);
	  // $gambarLama = htmlspecialchars($data["gambarLama"]);
  
	
		$sql = mysqli_query($konek,"select * from tbl_buku where id='$id'");
		$meta = mysqli_fetch_assoc($sql);
		$gambarLama = $meta['gambar'];

  
	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
	  $gambar = $gambarLama;
	} else {
	  $gambar = upload();
	}
  
  
	 mysqli_query($konek,"UPDATE tbl_buku SET judul='$judul',
													pengarang='$pengarang',
												   penerbit='$penerbit',
												   thn_terbit='$tahun',
												   isbn='$isbn',
												   jumlah_halaman='$jumlah_halaman',
												   keterangan='$keterangan',
												   jumlah_buku='$jumlah',
												   lokasi='$lokasi',
												   gambar= '$gambar',
												   tgl_input='$tgl_input'
												   WHERE id=$id");
	  
	return mysqli_affected_rows($konek);
  
  }
  
?>
