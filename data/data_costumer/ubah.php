<?php
require 'functions.php';

// ambil data di url
$id_costumer = $_GET["id_costumer"];

// query data akun berdasarkan prodi
$costumer = query("SELECT * FROM costumer
	WHERE id_costumer = '$id_costumer'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=costumer';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=costumer';
			</script>
		";
	}
}
?>


 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>UBAH DATA COSTUMER</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST" enctype="multipart/form-data">	
                    
					<div class="form-group">
					
					  <input type="hidden" name="fotolama" value="<?= $user["foto"]; ?>" >
					
					<label for="id_costumer">Id Costumer</label>
					<input type="text" name="id_costumer" id="id_costumer" class="form-control"
					required autocomplete="off" value="<?=$costumer["id_costumer"]; ?>" readonly>
					<br>
					
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off" value="<?=$costumer["nama_lengkap"]; ?>">
					<br>
					
					<label for="tanggal_terdaftar">Tanggal Terdaftar</label>
					<input type="text" name="tanggal_terdaftar" id="tanggal_terdaftar" class="form-control"
					required autocomplete="off" value="<?=$costumer["tanggal_terdaftar"]; ?>">
					<br>
					
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control"
					required autocomplete="off" value="<?=$costumer["alamat"]; ?>">
					<br>
					
					<label for="no_hp">No HP</label>
					<input type="text" name="no_hp" id="no_hp" class="form-control"
					required autocomplete="off" value="<?=$costumer["no_hp"]; ?>">
					<br>
					
					<label for="nama_perusahaan">Nama_perusahaan</label>
					<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
					required autocomplete="off" value="<?=$costumer["nama_perusahaan"]; ?>">
					<br>
					
					

					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>