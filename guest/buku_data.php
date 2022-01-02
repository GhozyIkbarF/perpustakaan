   <?php
   include '../conn/koneksi.php';
   ?>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	 <script type="text/javascript">
  	$(document).ready(function() {
     $('#example').DataTable();
  	} );
 	</script>
   <style>
	   #menu_header{
		   margin-bottom: 10px;
	   }
   </style>
   <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="bg_menu"><b>Data Buku</b></div><br>
    	<div id="content_menu">
        <div id="menu_header">
        	<form action="?page=buku_search" method="post">
        	<table width="100%">
            	<tr>
                	<td width="75%"></td>
                    <!-- <td width="25%" align="right"><input class="form-control me-2" type="search" name="cari" placeholder="Judul Buku, Pengarang"></td>
                    <td><button class="btn btn-outline-success" type="submit" id="submit" value="cari">Search</button></td> -->
                </tr>
            
            </table>
            </form>
            
    	</div>
   	    <div class="zebra-table">
   	      <table id="example" style="width:100%" class="table table-striped table-bordered" width="100%" align="center" cellspacing="0" cellpadding="5">
   	        <thead align="center">
   	          <tr>
   	            <th align="center" width="5%" >No</th>
   	            <th width="30%">Judul Buku</th>
   	            <th width="20%">Pengarang</th>
   	            <th width="15%">Penerbit</th>
   	            <th width="15%">Jumlah</th>
              </tr>
            </thead>
            <?php
				$query = "SELECT * FROM tbl_buku ORDER by judul";
				$sql = mysqli_query($konek,$query);
				$total = mysqli_num_rows($sql);
				$no = 1;
				
				while ($data=mysqli_fetch_array($sql)) {
			?>
   	        
   	          <tr>
   	            <td align="center"><?php echo $no; ?></td>
   	            <td ><a style="text-decoration: none;" href="?page=detil-buku&judul=<?php echo $data['judul']; ?>" class="detil"><?php echo $data['judul']; ?></a></td>
   	            <td align="center"><?php echo $data['pengarang']; ?></td>
   	            <td align="center"><?php echo $data['penerbit']; ?></td>
   	            <td align="center"><?php echo $data['jumlah_buku']; ?></td>
                
              </tr>
              
            <?php $no++; } ?>
            
           
          </table>
          </div>
          
   	  </div>
    </div>

	<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">