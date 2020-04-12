<?php
require 'functions.php';

$barang = query("SELECT * FROM tb_barang");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA KATEGORI BARANG</h1>
				<hr>
            </div>
              <a href="?page=barang&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Kategori Barang</th>
      <th scope="col" class="text-center">Kategori Barang</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($barang as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_barang"]; ?></td>
	  <td class="text-center"><?= $row ["jenis_barang"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=barang&aksi=ubah&id_barang=<?= $row ["id_barang"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=barang&aksi=hapus&id_barang=<?= $row ["id_barang"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
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
