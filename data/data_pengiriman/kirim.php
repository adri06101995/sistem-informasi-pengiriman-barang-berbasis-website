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
				<h1>DATA PENGIRIMAN</h1>
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
	  <td class="text-center"><?= $row ["nama_perusahaan"]; ?></td>
	  
	   
	  <td class="text-center">
		<a href="?page=pengiriman&aksi=tambah&id_costumer=<?= $row ["id_costumer"]; ?>" class="btn btn-success btn-xs">Tambah Pengiriman<a>
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
