<?php
include "../database/koneksi.php";

	
	
$content = '
<style>
.content{
    font-family: "Times New Roman", Times, serif;
}
.tabel { border-collapse:collapse; }
.tabel th { padding:8px 5px; font-size:12;}
.tabel td { padding:8px 5px; font-size:10;}


</style>
';	

$content .= '
<page>
	<div style="padding:4mm; border:0px solid;" align="center">
		<span style="font-size:25px;">LAPORAN DAFTAR PENGIRIMAN</span>
		<hr>
	</div>
	<div style="padding:20px 0 10px 0; font-size:15;">
		Laporan Daftar Pengiriman
	</div>
<table border="1px" class="tabel">
	
    <tr>
      <th  align="center" >No</th>
      <th  align="center" >Id pengiriman</th>
      <th  align="center" >Nama Lengkap</th>
	  <th  align="center" >Nama Perusahaan</th>
	  <th  align="center" >Kategori Barang</th>
	  <th  align="center" >Nama Barang</th>
	  <th  align="center" >Koli/PCS</th>
	  <th  align="center" >Berat/Kilo</th>
	  <th  align="center" >Berat Total</th>
	  <th  align="center" >Tanggal Masuk Barang</th>
	  
	  
	  
	
	  
	 </tr>';
	 
	  $i = 1;
	    
//INNER JOIN prodi ON d_dosen.id_prodi = prodi.id_prodi 
//INNER JOIN fakultas ON d_dosen.id_prodi = prodi.id_prodi AND prodi.id_fak = fakultas.id_fak		
		  
	  
	  if (@$_POST['cetak_data']){ 
			
			$keywords = $_POST['keywords'];
			
		    $pengiriman = mysqli_query($conn, "SELECT * FROM tb_pengiriman
						INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
						INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
						INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
				     	WHERE nama_lengkap like '%$keywords%' OR
						      nama_perusahaan like '%$keywords%' OR
							  jenis_barang like '%$keywords%' OR
							  nama_barang like '%$keywords%' OR
							  tanggal_kirim like '%$keywords%' 
						  "); 
	  }else {
			
			 $pengiriman = mysqli_query($conn, "SELECT * FROM tb_pengiriman 
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
					INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
					
			
			");
	  
	  }
	  
	  
     foreach ($pengiriman as $row):  
	$content .= '
	<tr>
      <td>'.$i.'</td>
      <td align="center" width="5%">'.$row ["id_pengiriman"].'</td>
	  <td>'. $row ["nama_lengkap"].'</td>
	  <td align="center" width="5%">'.$row ["nama_perusahaan"].'</td>
	  <td align="center" width="5%">'.$row ["jenis_barang"].'</td>
	  <td align="center" width="5%">'.$row ["nama_barang"].'</td>
	  <td align="center" width="5%">'.$row ["pcs"].' Koli</td>
	  <td align="center" width="5%">'.$row ["berat"].' Kg</td>
	  <td align="center" width="5%">'.$row ["bertotal"].' Kg</td>
	  <td align="center" width="5%">'.$row ["tanggal_kirim"].'</td>
	  
	  
	  
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