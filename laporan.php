    <style type="text/css">
	.laporan {
		text-decoration:none;
	}
	.table_input a:hover {
		color:#0FF;
	}
	</style>
	
	<?php include '../conn/koneksi.php'; ?>
    <!-- menu tengah -->
	<div style="background-color: #fff; padding: 15px; height:  655px;" id="menu-tengah">
    	<div id="content_menu">
        <div id="menu_header">
        	<table width="100%">
            	<tr>
                	<td align="center"><b>All Laporan</b></td>
                </tr>
            
            </table>
    	</div>
        
   	    <div class="table_input">
   	      <table width="100%" align="center" cellspacing="0" cellpadding="5">
            <tbody>
            	<tr>
                	<td width="30%"><a class="laporan" href="../print-buku.php" class="lap" target="_blank">Laporan Buku</a></td>
                </tr>
                <tr>
                	<td width="30%"><a class="laporan" href="../print-anggota.php" class="lap" target="_blank">Laporan Anggota</a></td>
                </tr>
                <tr>
                	<td width="30%"><a class="laporan" href="../print-transaksi.php" class="lap" target="_blank">Laporan Transaksi</a></td>
                </tr>
                
            </tbody>
          </table>
 	      </div>
   	  </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">