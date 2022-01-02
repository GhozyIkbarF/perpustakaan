<?php 
    // koneksi ke db
    include 'conn/koneksi.php';

    function register(){
        global $konek;

        $username = strtolower($_POST['username']);
        $nama = htmlspecialchars($_POST['nama']);
        $password = htmlspecialchars($_POST['password']);
        $konfirmasi = htmlspecialchars($_POST['konfirmasi']);
        $email = htmlspecialchars($_POST['email']);
        $jns_kelamin = htmlspecialchars($_POST['jns_kelamin']);
        $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
        $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
        $alamat = htmlspecialchars($_POST['alamat']);

        $result = mysqli_query($konek, "select username from tbl_user where username='$username' and level='user'");

        if (mysqli_fetch_assoc($result)){
            echo "<script>
                alert('username sudah terdaftar')
            </script>";
            return false;
        }

        if ($password !== $konfirmasi){
            echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
        }
 

        $gambar = upload();

        if($gambar){
            $query_insert = "insert into tbl_user values (null, '$nama', '$username', '$password' ,'$email', '$jns_kelamin', '$tmp_lahir', '$tgl_lahir', '$alamat', '$gambar', 'user')";
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
            move_uploaded_file($tmpName, "images/".$namaBaru);

            return $namaBaru;
        }
    }
?>