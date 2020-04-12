<?php
require 'functions.php';

$costumer = query("SELECT * FROM costumer");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA COSTUMER</h1>
				<hr>
            </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id costumer</th>
      <th scope="col" class="text-center">Nama Lengkap</th>
	  <th scope="col" class="text-center">Tanggal Terdaftar</th>
	  <th scope="col" class="text-center">Alamat</th>
	  <th scope="col" class="text-center">No HP</th>
	  <th scope="col" class="text-center">Nama Perusahaan</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($costumer as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_costumer"]; ?></td>
	  <td class="text-center"><?= $row ["nama_lengkap"]; ?></td>
	  <td class="text-center"><?= $row ["tanggal_terdaftar"]; ?></td>
	  <td class="text-center"><?= $row ["alamat"]; ?></td>
	  <td class="text-center"><?= $row ["no_hp"]; ?></td>
	  <td class="text-center"><?= $row ["nama_perusahaan"]; ?></td>
	  
	   
	  <td class="text-center">
	    <a href="?page=costumer&aksi=kirim&id_costumer=<?= $row ["id_costumer"]; ?>" class="btn btn-info btn-xs">Data Pengiriman<a>

	  </td>
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>

<a ><button type="button" class="btn btn-default" data-toggle="modal" data-target="#cetakpdf" style="margin-top: 8px;"><i class="fa fa-print"> </i> ExportToPDF</button></a>

<?php
include "modal_cetakpdf.php";
?>
 
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
