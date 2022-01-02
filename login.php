<!DOCTYPE HTML>
<html>
<head>
<title>Login Sistem</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <?php 
include 'conn/koneksi.php';
 if(isset($_POST['log'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass']; 
	$sql = mysqli_query($konek,"SELECT * FROM tbl_user where username='$user' and password='$pass'");
	$data = mysqli_fetch_assoc($sql);
	
	if (mysqli_num_rows($sql) === 1){
		if ($data['username']==$user && $data['password']==$pass) {
			session_start();
            $_SESSION['id']=$data['id'];
			$_SESSION['nama']=$data['nama'];
			$_SESSION['level']=$data['level'];
			$level = $_SESSION['level'];
			if ($level =='admin') {
				echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin/index.php'>";
                exit;
			}
			else {
				echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
				echo "<meta http-equiv='refresh' content='0; url=guest/index.php'>";
                exit;
			}
		} 
        
	}
    $error = true;
}

      
?> 
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Roboto&display=swap" rel="stylesheet"> 
 <style>
     
*{
    font-family: 'Roboto'
}
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .title h1{
            font-weight:bold;
            font-size: 80px;
        }
        .shadow{
            border-radius: 5px;
            width: 300px;
            padding-top: 10px;
            margin-top: 30px;
        }
        h2{
            text-align: center;
            margin-bottom: 15px;
            margin-top: 15px;
        }
        .isi{
            margin: 0;
			margin-bottom: 5px;
            display: flex;
            flex-direction: column;
        }
        .isi input{
            margin-bottom: 10px;
            padding: 7px;
            
        }
        .sign-up{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>PERPUSKU</h1>
    </div>
    <div class="shadow  border-3 border-primary border-top">
        <div class="login">
            <center><h2>Login</h2>
                <?php if(isset($error)): ?>
                    <p style="color: red; font-style: italic;margin-bottom:-10px;">Username / Password Salah</p>
                <?php endif; ?>
            </center>
            <form action="" method="POST" style="padding: 25px;" class="form">
                <div class="isi">
                    <input  type="text" name="user" autofocus placeholder="Username" required>
                    <input  type="password" name="pass" autofocus placeholder="Password" required>
					<button type="submit" name="log" value="Sign In" class="btn btn-primary">Sign In</button>
                </div>
                <input type="checkbox" name="remember">
                Remember me
                <br><br>
                <center><p class="sign-up">Don't have an account?<a style="text-decoration: none;" href="registrasi.php"> Sign Up</a></p></center>
            </form>
        </div>
    </div>
</body>
</html>