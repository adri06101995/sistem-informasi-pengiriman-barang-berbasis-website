<?php
require 'functions.php';

$id_costumer = $_GET["id_costumer"];

$costumer = query("SELECT * FROM costumer WHERE id_costumer = '$id_costumer'")[0];

$pengiriman = query("SELECT * FROM tb_pengiriman
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
					INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					WHERE id_costumer like '%$id_costumer%'");					
		
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA PENGIRIMAN</h1>
				<hr>
<table>
	<tr>
		<th>id_costumer</th><td>&nbsp: &nbsp </td><td><?= $costumer["id_costumer"] ?></td>
	</tr>
	<tr>
		<th>Nama Lengkap</th><td>&nbsp: &nbsp </td><td><?= $costumer["nama_lengkap"]; ?></td>
	</tr>
	
</table><br>


            </div>
            
           </div>
	
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Pengiriman</th>
	  <th scope="col" class="text-center">Kategori Barang</th>
	  <th scope="col" class="text-center">Nama Barang</th>
	  <th scope="col" class="text-center">Berat Barang</th>
	  <th scope="col" class="text-center">Tanggal Masuk Barang</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($pengiriman as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_pengiriman"]; ?></td>
	  <td class="text-center"><?= $row ["jenis_barang"]; ?></td>
	  <td class="text-center"><?= $row ["nama_barang"]; ?></td>
	  <td class="text-center"><?= $row ["bertotal"]; ?> Kg</td>
	  <td class="text-center"><?= $row ["tanggal_kirim"]; ?></td>
	  
	   
	  <td class="text-center">
		<a href="?page=pengiriman&aksi=ubah&id_pengiriman=<?= $row ["id_pengiriman"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=pengiriman&aksi=hapus&id_pengiriman=<?= $row ["id_pengiriman"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
	  </td>
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>

<br>
<br>
