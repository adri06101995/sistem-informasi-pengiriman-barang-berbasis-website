<?php
require 'functions.php';

// ambil data di url
$id_barang = $_GET["id_barang"];

// query data akun berdasarkan prodi
$barang = query("SELECT * FROM tb_barang
	WHERE id_barang = '$id_barang'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=barang';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=barang';
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
				<h1>UBAH DATA KATEGORI BARANG</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_barang">Id Kategori Barang</label>
					<input type="text" name="id_barang" id="id_barang" class="form-control"
					required autocomplete="off" value="<?=$barang["id_barang"]; ?>" readonly>
					<br>
					
					<label for="jenis_barang">Kategori Barang</label>
					<input type="text" name="jenis_barang" id="jenis_barang" class="form-control"
					required autocomplete="off" value="<?=$barang["jenis_barang"]; ?>">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>