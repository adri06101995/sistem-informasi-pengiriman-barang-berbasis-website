<?php
require 'functions.php';

// ambil data di url
$id_costumer = $_GET["id_costumer"];

$costumer = query("SELECT * FROM costumer WHERE id_costumer = '$id_costumer'")[0];
	
	
$no = mysqli_query($conn, "SELECT id_pengiriman FROM tb_pengiriman ORDER BY id_pengiriman DESC");

$id_pengiriman = mysqli_fetch_array($no);
$kode = $id_pengiriman['id_pengiriman'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "Id"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "Id"."0".$tambah;
}else{
	$format1 = "Id".$tambah;
}

$no = mysqli_query($conn, "SELECT kode FROM kd_pengiriman ORDER BY kode DESC");

$kode = mysqli_fetch_array($no);
$kode = $kode['kode'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format = "KP"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format = "KP"."0".$tambah;
}else{
	$format = "KP".$tambah;
}

$pengiriman = query("SELECT * FROM tb_pengiriman
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang
					INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
					WHERE kode like '%$format%'");	




// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				window.location.reload();
				alert('data berhasil di tambahkan!');
			</script>
			";
			
			return false;

}

if( isset($_POST["kembali"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( kembali($_POST) > 0 ) {
		echo "<script>
				document.location.href = 'index.php?page=kirim';
			</script>
			";

}
	
	
?>







		
		 
<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>TAMBAH PENGIRIMAN BARANG</h1>
				<hr>
            </div>
			
			
			<form action="report/cetak_nota.php" method="POST" target="_blank">

					<input type="hidden" name="id_costumer" id="id_costumer" class="form-control"
					required autocomplete="off" value="<?php echo $id_costumer;?>"readonly>
					<input type="hidden" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off" value="<?= $costumer["nama_lengkap"]; ?>"readonly>
					<input type="hidden" name="tanggal_kirim" id="tanggal_kirim" class="form-control"
					required autocomplete="off" value="<?=date("d-M-Y"); ?>" readonly>
					
					<input type="hidden" name="kode" id="kode" class="form-control"
					required autocomplete="off" value="<?php echo $format;?>"readonly>
					
					<input type="hidden" name="petugas" id="petugas" class="form-control"
					required autocomplete="off" value="<?= $user['nama_lengkap']; ?>"readonly>

					<button type="submit" name="submit" class="btn btn-danger">Cetak</button>
	
			</form>
					
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					<table>
					
					
					
					<input type="hidden" name="id_pengiriman" id="id_pengiriman" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<input type="hidden" name="id_costumer" id="id_costumer" class="form-control"
					required autocomplete="off" value="<?php echo $id_costumer;?>"readonly>
					
					<div class="col-xs-3">
					
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off" value="<?= $costumer["nama_lengkap"]; ?>"readonly>
					<br>
					
					</div>
					
					<div class="col-xs-3">
					<label for="id_barang">Kategori Barang</label>
					
					<?php
		
					$sql_kategori = mysqli_query($conn,'select * from tb_barang');
					
					?>
					<select class="form-control" name="barang" id="barang">
					<option>-- Pilih Kategori --</option>
					<?php while($row_kategori = mysqli_fetch_array($sql_kategori)) { ?>
					<option value="<?php echo $row_kategori['id_barang'] ?>"><?php echo $row_kategori['jenis_barang'] ?></option>
				    <?php } ?>
					</select>
					<br>
					</div>
					
					<div class="col-xs-3">
					<label for="id_nabar">Nama Barang</label>
					<select class="form-control" name="nabar" id="nabar">
					<option>-- Pilih Barang --</option>
					<option></option>
					</select>
					<br>
					</div>
					</form>
					
					<div class="col-xs-3">
					<label for="pcs">Koli/PCS</label>
					<input type="text" name="pcs" id="pcs" class="form-control"
					required autocomplete="off">
					<br>
					</div>
					
					<div class="col-xs-3">
					<label for="berat">Berat/Kg</label>
					<input type="text" name="berat" id="berat" class="form-control"
					required autocomplete="off">
					<br>
					</div>
					
					</table>
					
					<input type="hidden" name="tanggal_kirim" id="tanggal_kirim" class="form-control"
					required autocomplete="off" value="<?=date("d-M-Y"); ?>" readonly>
					
					
					<input type="hidden" name="kode" id="kode" class="form-control"
					required autocomplete="off" value="<?php echo $format;?>"readonly>
								
				<table>
				<th>
				<br>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				
				</form>
				</th>
				<th>
				<br>
				<form action="" method="POST">
					<input type="hidden" name="kode" id="kode" class="form-control"
					required autocomplete="off" value="<?php echo $format;?>"readonly>
					<button type="submit" name="kembali" class="btn btn-success">kembali</button>
					
				</form>
				</th>
				</table>
				<br><br>
				
				
				 <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Pengiriman</th>
	  <th scope="col" class="text-center">Kategori Barang</th>
	  <th scope="col" class="text-center">Nama Barang</th>
	  <th scope="col" class="text-center">Koli/PCS</th>
	  <th scope="col" class="text-center">Berat/Kg</th>
	  <th scope="col" class="text-center">Total</th>
	  <th scope="col" class="text-center">Tanggal Masuk Barang</th>
	  
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
	  <td class="text-center"><?= $row ["pcs"]; ?></td>
	  <td class="text-center"><?= $row ["berat"]; ?></td>
	  <td class="text-center"><?= $row ["bertotal"]; ?></td>
	  <td class="text-center"><?= $row ["tanggal_kirim"]; ?></td>
	  
	   
	
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
 
            <!-- /.box-body -->
          </div>
		  </div>
				
				
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  