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
		<span style="font-size:25px;">DAFTAR DATA PENGGUNA</span>
		<hr>
	</div>
	<div style="padding:20px 0 10px 0; font-size:15;">
		Laporan Data Pengguna
	</div>

<table border="1px" class="tabel">
	
    <tr>
      <th  align="center" >No</th>
      <th  align="center" >Id User</th>
      <th  align="center" >Nama Lengkap</th>
	  <th  align="center" >Username</th>
	  <th  align="center" >Password</th>
	  <th  align="center" >Fakultas</th>
	  <th  align="center" >prodi</th>
	  
	  
	  
	
	  
	 </tr>';
	 
	  $i = 1;
	      
		  
	  
	  if (@$_POST['cetak_data']){ 
			
			$keywords = $_POST['keywords'];
			
		    $dosen = query("SELECT * FROM dosen
			INNER JOIN prodi ON dosen.id_prodi = prodi.id_prodi 
			INNER JOIN fakultas ON dosen.id_prodi = prodi.id_prodi AND prodi.id_fakultas = fakultas.id_fakultas
			WHERE 
																nama_fakultas like '%$keywords%' OR
																nama_prodi like '%$keywords%'
																"); 
	  }else {
			
			$dosen = query("SELECT * FROM dosen
			INNER JOIN prodi ON dosen.id_prodi = prodi.id_prodi 
			INNER JOIN fakultas ON dosen.id_prodi = prodi.id_prodi AND prodi.id_fakultas = fakultas.id_fakultas
			");
	  
	  }
	  
	  
     foreach ($dosen as $row):  
	$content .= '
	<tr>
      <td>'.$i.'</td>
      <td>'.$row ["nidn"].'</td>
	  <td>'. $row ["nama_dosen"].'</td>
	  <td align="center" width="5%">'.$row ["username"].'</td>
	  <td align="center" width="5%">'.$row ["password"].'</td>
	  <td align="center" width="5%">'.$row ["nama_fakultas"].'</td>
	  <td align="center" width="5%">'.$row ["nama_prodi"].'</td>
	  
	  
	  
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