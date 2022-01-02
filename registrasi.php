<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <?php
        include 'conn/koneksi.php';
        require 'functionlogin.php';
        if (isset($_POST['register'])){
            if(register() > 0){
                echo "<script>
                alert('user telah ditambahkan')
            </script>";
            } else {
                echo mysqli_error($konek);
            }
        }
    ?>
</head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Roboto&display=swap" rel="stylesheet"> 
<style>
    
*{
    font-family: "Roboto";
}
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .shadow{
        border-radius: 5px;
        width: 700px;
        margin: 100px 0;
    }
    .bg-primary{
        width: 100%;
        height: 30px;
    }
    h2{
        text-align: center;
        margin-bottom: 5px;
        margin-top: 15px;
    }
    form{
        padding: 30px;
    }
    .row{
        margin-bottom: 9px;
    }
    .form-label{
        margin-bottom: 2px;
        font-size: 16px;
    }
    .calendar{
        display: flex;
        flex-direction: row;
    }
    .btn{
        margin-top: 10px;
    }
    .sign-in{
        font-size: 12px;
    }
</style>
<body>
    <div class="shadow">
    <div class=" bg-primary rounded-top"></div>
    <center>
    <h2>Create Account</h2>
    </center>
    <form method="POST" action="" enctype="multipart/form-data"> 
        <div class="row">
            <div class="col">
                <label for="name" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control"  name="nama" id="name" required>
            </div>
            <div class="col">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control"  name="username" id="Username" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control"  name="password" id="Password" required>
            </div>
            <div class="col">
                <label for="re-enter password" class="form-label">konfirmasi password</label>
                <input type="password" class="form-control"  name="konfirmasi" id="re-enter password"required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control"  name="email" id="Email" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Jenis kelamin" class="form-label">Jenis kelamin</label>
                <select class="form-select" name="jns_kelamin" aria-label="Default select example">
                    <option selected></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perampuan">Perampuan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="tmpLahir" class="form-label">Tempat lahir</label>
                <input type="text" class="form-control"  name="tmp_lahir" id="tmpLahir" required>
            </div>
            <div class="col">
                <label for="tglLahir" class="form-label">Tanggal lahir</label>
                <div class="calendar">
                    <input type="text" class="form-control"  name="tgl_lahir" id="tglLahir" required>
                    <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Address" class="form-label">Alamat</label>
                <input type="text" class="form-control"  name="alamat" id="Address" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar" required>
            </div>
        </div>
        <input type="submit" name="register" value="submit" class="btn btn-sm btn-primary">&nbsp;<a href="login.php" class="btn btn-sm btn-danger">Batal</a><br><br>
         <p class="sign-in">Sudah punya akun?<a style="text-decoration: none;" href="login.php"> login</a>
    </form>
    
    </div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="tgl_lahir"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
</body>
</html>