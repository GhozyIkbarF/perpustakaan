   <?php include 'conn/koneksi.php'; ?>
   <Style>
    .col-8 table tr{
        margin-bottom: 10px;
    }
</Style>
   <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu"><b>Profil</b></div>
    	<div id="content_menu">
        
        <div style="display: flex; justify-content: space-between; margin-top:10px" class="row">
                <div class="col-8 " style="width: 400px; ">
                <table style="height: 300px;" width="100%"  cellspacing="0" cellpadding="5">
                <?php
                    $id	= isset($_GET['id']) ? $_GET['id'] : "";
                    $query=mysqli_query($konek,"SELECT * FROM tbl_user WHERE id='$id'");
                    $data=mysqli_fetch_assoc($query);
                    ?>  
                        <tr >
                                <td width="35%" >nama</td>
                                <td >:</td>
                                <td ><?= $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td >Username</td>
                                <td>:</td>
                                <td><?= $data['username']; ?></td>
                            </tr>
                            <tr>
                                <td >Email</td>
                                <td>:</td>
                                <td><?= $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td >Jenis kelamin</td>
                                <td>:</td>
                                <td><?= $data['jns_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <td >TTL</td>
                                <td>:</td>
                                <td><?=$data['tmp_lahir']; ?>, <?= $data['tgl_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td >Alamat</td>
                                <td >:</td>
                                <td ><?php echo $data['alamat']; ?></td>
                            </tr>  
                    </table>
                </div>
                <div class="col-4">
                    <img src="../images/<?=$data['foto']?>" style="width: 250px; height:200px;">
                </div>
            </div>
 	      </div>
   	  </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">