<?php
require 'functions.php';

   

			
	
$content = '
<style>
.content{
    font-family: "Times New Roman", Times, serif;
}

img {
  float: left;
  
 
}

span {
	 text-align: center;

}


.tabel { border-collapse:collapse; }
.tabel tr { padding:0px 0px; font-size:10;}
.tabel th { padding:8px 5px; font-size:10;}
.tabel td { padding:8px 5px; font-size:10;}
.tabel1 th { padding:0px 0px; font-size:10;}
.tabel1 td { padding:0px 0px; font-size:10;}


</style>
';	

$content .= '
<page>

	
	
	
		
		<img src="qua.PNG" alt="logo" width="90">
	
		
		<span style="font-size:20px;">TANDA TERIMA BARANG</span>
	
		
		<hr>
	
	
	
<div style="padding:4mm; border:0px solid;">
	
<table class="tabel1">
	<tr>
		<th>Pengirim</th><td>:</td><td>'.$_POST["nama_lengkap"].'</td>
	</tr>
	<tr>
		<th>Date</th><td>:</td><td>'.$_POST["tanggal_kirim"].'</td>
	</tr>
	<tr>
		<th>Kode Nota</th><td>:</td><td>'.$_POST["kode"].'</td>
	</tr>
</table><br>
	

<table border="1px" class="tabel">';
	
	$content .= '
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Pengiriman</th>
	  <th scope="col" class="text-center">Kategori Barang</th>
	  <th scope="col" class="text-center">Nama Barang</th>
	  <th scope="col" class="text-center">Koli/PCS</th>
	  <th scope="col" class="text-center">Berat/Kg</th>
	  <th scope="col" class="text-center">Berat Total</th>
	  <th scope="col" class="text-center">Keterangan</th>
	  
	  
	  
	
	  
	 </tr>';
	 
	  $i = 1;
	      
			
			$keywords = $_POST['kode'];
			
		    $pengiriman = mysqli_query($conn,"SELECT * FROM tb_pengiriman
						INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
						INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					    INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
				     	WHERE 
							kode = '$keywords'  
						  "); 
			
				while ($tampil = mysqli_fetch_assoc($pengiriman)) {
		$jumlah = mysqli_num_rows($pengiriman);
		}
	 
	 $total = 0; 
     foreach ($pengiriman as $row):  
	$content .= '
	<tr>
      <td>'.$i.'</td>
      <td align="center" width="5%">'.$row ["id_pengiriman"].'</td>
	  <td align="center" width="5%">'.$row ["jenis_barang"].'</td>
	  <td align="center" width="5%">'.$row ["nama_barang"].'</td>
	  <td align="center" width="5%">'.$row ["pcs"].' Koli</td>
	  <td align="center" width="5%">'.$row ["berat"].' Kg</td>
	  <td align="center" width="5%">'.number_format($row ["bertotal"], 0, ',', '.').' Kg</td>
	  <td align="center" width="5%"></td>
	  
	  
	  
    </tr>';
	$i++;
	$total += $row["bertotal"];
	endforeach; 
	
	$rat = number_format($total, 0, ',', '.');
  
$content .='
<tr>
	<th colspan="6" align="center">Jumlah</th>
	<th align="center">'.$rat.' Kg</th>
	<th> </th>
	
	
	</tr>
</table><br><br>

<table class="tabel">
	<tr>
		<td align="center" width="350">Pengirim</td><td align="center" width="350">Petugas</td>
	</tr>
</table><br><br>

<table class="tabel">
	<tr>
		<td align="center" width="350"><u>'.$_POST["nama_lengkap"].'</u></td>
		<td align="center" width="350"><u>'.  $_POST["petugas"] .'</u></td>
	</tr>
</table>

</div>
</page>';

require_once('html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('p','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>