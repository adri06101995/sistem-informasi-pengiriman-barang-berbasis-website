<?php
require 'functions.php';

// ambil data di url
$id_nabar = $_GET["id_nabar"];

// query data akun berdasarkan prodi
$nabar = query("SELECT * FROM tb_nabar
				INNER JOIN tb_barang ON tb_nabar.id_barang = tb_barang.id_barang
				WHERE id_nabar = '$id_nabar'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=nabar';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=nabar';
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
				<h1>UBAH DATA BARANG</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_nabar">Id Barang</label>
					<input type="text" name="id_nabar" id="id_nabar" class="form-control"
					required autocomplete="off" value="<?=$nabar["id_nabar"]; ?>" readonly>
					<br>
					
					<label for="id_barang">Kategori Barang</label>
					<select class="form-control" name="id_barang" id="id_barang">
					<option value="<?=$nabar["id_barang"]; ?>"><?=$nabar["jenis_barang"]; ?></option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_barang");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo
					
					
					'<option value="'.$data['id_barang'].
					'">'.$data['jenis_barang'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<label for="nama_barang">Nama Barang</label>
					<input type="text" name="nama_barang" id="nama_barang" class="form-control"
					required autocomplete="off" value="<?=$nabar["nama_barang"]; ?>">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>