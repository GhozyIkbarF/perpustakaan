<?php
 include '../conn/koneksi.php'; ?>
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">
<style>
   
.jumlah_data .row{
    display: flex;
    justify-content: center;
}
.sm-st {
  background:#fff;
  padding:20px;
  -webkit-border-radius:3px;
  -moz-border-radius:3px;
  border-radius:3px;
  margin-bottom:20px;
  -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
  box-shadow: 0 1px 0px rgba(0,0,0,0.05);
}
.sm-st-icon {
  width:60px;
  height:60px;
  display:flex;
  align-items: center;
  justify-content: center;
  line-height:60px;
  font-size:30px;
  background:#eee;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  float:left;
  margin-right:10px;
  color:#fff;
}
.sm-st-info {
  font-size:12px;
  padding-top:2px;
}
.sm-st-info span {
  display:block;
  font-size:24px;
  font-weight:600;
}
.st-red {
  background-color: #F05050;
}
.st-violet {
  background-color: #7266ba;
}
.st-blue {
  background-color: #23b7e5;
}
.st-green{
  background-color: #27C24C;
}
.cardbook{
  -webkit-box-shadow: 0 10px 6px -6px #777;
     -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
          margin: 20px;
          margin-right: 40px;
  
}
.card-body{
  background-color: #fff;
}
.katalog{
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 75px;
}
</style>
     <!-- menu tengah -->
	<div style=" padding: 15px;" id="menu-tengah">
    	
    	<div id="content_menu">
            <div class="jumlah_data">
                <div class="row">
                        <div class="col-md-3 ">
                            <div class="sm-st clearfix ">
                                <span class="sm-st-icon st-red"><i class="fas fa-users"></i></span>
                                <div class="sm-st-info">
                                    <?php $tampil = mysqli_query($konek, "select * from tbl_user where level='user'");
                                    $total = mysqli_num_rows($tampil);
                                    ?>
                                    <span><?php echo "$total"; ?></span>
                                    Total Anggota
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <?php $tampil = mysqli_query($konek, "select * from tbl_buku order by id");
                                    $total1 = mysqli_num_rows($tampil);
                                    ?>
                                    <span><?php echo "$total1"; ?></span>
                                    Total Buku
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
                                    <?php $tampil = mysqli_query($konek, "select * from tbl_user where level='admin'");
                                    $total2 = mysqli_num_rows($tampil);
                                    ?>
                                    <span><?php echo "$total2"; ?></span>
                                    Total Admin
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fas fa-clipboard"></i></span>
                                <div class="sm-st-info">
                                    <?php $tampil = mysqli_query($konek, "select * from tbl_transaksi order by id");
                                    $total1 = mysqli_num_rows($tampil);
                                    ?>
                                    <span><?php echo "$total1"; ?></span>
                                    Total Transaksi
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
           

            <div class="katalog">
                <?php
                $query = "SELECT * FROM tbl_buku ORDER by id";
                $sql = mysqli_query($konek,$query);
                $total = mysqli_num_rows($sql);
                
                  
                while ($data=mysqli_fetch_array($sql)) {
              ?>
                <div class="cardbook" style="width: 25rem;">
                  <img src="../images/<?= $data['gambar'] ?>" style="width: 25rem; height: 18rem; border-radius: 5px 5px 0 0" class="card-img-top" alt="...">
                  <div style="padding: 5px" class="card-body">
                    <h5 class="card-title"><?= $data['judul'] ?></h5>
                    <p style="font-size: 12px;" class="card-text"><?= $data['keterangan'] ?></p>
                  </div>
                </div>
              <?php } ?>
            </div>

	  </div>
    </div>

  