   <?php
   include '../conn/koneksi.php';
   ?>
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script> -->
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
    	<div id="bg_menu"><b>Data Anggota</b></div><br>
    	<div id="content_menu">
        <div id="menu_header">
        	<form action="?page=user_search" method="post">
        	<table width="100%">
            	<tr>
                	<td width="75%"><a class="btn btn-sm btn-success" href="?page=user_input">Input Anggota</a></td>
                </tr>
            
            </table>
            </form>
    	</div>
		<div class="table-responsive">
			<table id="example" style="width:100%" class="table table-striped table-bordered" align="center" cellspacing="0" cellpadding="5">
				<thead align="center">
					<tr>
						<th align="center" width="5%" >No</th>
			   	        <th width="20%">Nama</th>
			   	        <th width="20%">Email</th>
			   	        <th width="15%">Level</th>
			            <th width="8%">Tindakan</th>
					</tr>
				</thead>
					<?php
						$query = "SELECT * FROM tbl_user where level='user' ORDER by id";
						$sql = mysqli_query($konek,$query);
						$total = mysqli_num_rows($sql);
						$no = 1;
							
						while ($data=mysqli_fetch_array($sql)) {
					?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
			   	        <td ><a style="text-decoration:none;" href="?page=user_detil&id=<?=$data['id']?>"><?php echo $data['nama']; ?></a></td>
			   	        <td ><?php echo $data['email']; ?></td>
			   	        <td align="center"><?php echo $data['level']; ?></td>
			            <td align="center">
							<a class="btn btn-sm btn-primary" href="?page=user_edit&id=<?=$data['id']?>"><i class="fas fa-edit"></i></a>
			                <a class="btn btn-sm btn-danger" href="?page=user_hapus&id=<?=$data['id']?>" onclick="return confirm('Anda yakin ingin menghapus data user <?=$data['nama']?> ?')"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
					
				<?php $no++; } ?>
				</table>
			</div>
   	  </div>
    </div>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">