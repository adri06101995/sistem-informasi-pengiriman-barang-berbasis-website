<?php
require 'functions.php';



   

			
	
$content = '
<style>
.content{
    font-family: "Times New Roman", Times, serif;
}
.tabel { border-collapse:collapse; }
.tabel th { padding:8px 5px; font-size:16;}
.tabel td { padding:8px 5px; font-size:14;}


</style>
';	

$content .= '
<page>
	<div style="padding:4mm; border:0px solid;" align="center">
		<span style="font-size:25px;">LAPORAN DAFTAR COSTUMER</span>
		<hr>
	</div>
	<div style="padding:20px 0 10px 0; font-size:15;">
		Laporan Daftar Costumer
	</div>

<table border="1px" class="tabel">
	
    <tr>
      <th  align="center" >No</th>
      <th  align="center" >Id Costumer</th>
      <th  align="center" >Nama Lengkap</th>
	  <th  align="center" >Tanggal Terdaftar</th>
	  <th  align="center" >Alamat</th>
	  <th  align="center" >No HP</th>
	  <th  align="center" >Nama Perusahaan</th>
	  
	  
	  
	
	  
	 </tr>';
	 
	  $i = 1;
	      
		  
	  
	  if (@$_POST['cetak_data']){ 
			
			$keywords = $_POST['keywords'];
			
		    $costumer = query("SELECT * FROM costumer
			WHERE 
																id_costumer like '%$keywords%' OR
																nama_lengkap like '%$keywords%' OR
																tanggal_terdaftar like '%$keywords%' OR
																alamat like '%$keywords%' OR
																no_hp like '%$keywords%' OR
																nama_perusahaan like '%$keywords%'
																"); 
	  }else {
			
			$costumer = query("SELECT * FROM costumer
			
			 
			
			");
			 
	  
	  }
	  
	  
     foreach ($costumer as $row):  
	$content .= '
	<tr>
      <td>'.$i.'</td>
      <td>'.$row ["id_costumer"].'</td>
	  <td>'. $row ["nama_lengkap"].'</td>
	  <td align="center" width="5%">'.$row ["tanggal_terdaftar"].'</td>
	  <td align="center" width="5%">'.$row ["alamat"].'</td>
	  <td align="center" width="5%">'.$row ["no_hp"].'</td>
	  <td align="center" width="5%">'.$row ["nama_perusahaan"].'</td>
	  
	  
	  
    </tr>';
	$i++;
	endforeach; 
	 
	
	
	
  
$content .='
</table>
</page>';

require_once('html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('l','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>