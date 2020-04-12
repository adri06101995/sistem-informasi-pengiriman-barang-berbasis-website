<?php
require 'functions.php';	
	

$no = mysqli_query($conn, "SELECT id_costumer FROM costumer ORDER BY id_costumer DESC");

$id_costumer = mysqli_fetch_array($no);
$kode = $id_costumer['id_costumer'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "IC"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "IC"."0".$tambah;
}else{
	$format1 = "IC".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=costumer';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=costumer';
			</script>";

}
	
?>



		
		 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>TAMBAH DATA COSTUMER</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_costumer">Id_Costumer</label>
					<input type="text" name="id_costumer" id="id_costumer" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off">
					<br>
					
					
					<label for="tanggal_terdaftar">Tanggal Terdaftar</label>
					<input type="text" name="tanggal_terdaftar" id="tanggal_terdaftar" class="form-control"
					required autocomplete="off" value="<?=date("d-M-Y"); ?>" readonly>
					<br>
					
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="no_hp">No HP</label>
					<input type="text" name="no_hp" id="no_hp" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="nama_perusahaan">Nama Perusahaan</label>
					<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
					required autocomplete="off">
					<br>
					
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  