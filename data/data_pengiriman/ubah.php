<?php
require 'functions.php';

// ambil data di url
$id_pengiriman = $_GET["id_pengiriman"];

// query data akun berdasarkan prodi
$pengiriman = query("SELECT * FROM tb_pengiriman
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang
	                WHERE id_pengiriman = '$id_pengiriman'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=kirim';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=kirim';
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
				<h1>UBAH DATA PENGIRIMAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_pengiriman">Id Pengiriman</label>
					<input type="text" name="id_pengiriman" id="id_pengiriman" class="form-control"
					required autocomplete="off" value="<?=$pengiriman["id_pengiriman"]; ?>" readonly>
					<br>
					
					<label for="id_costumer">Id costumer</label>
					<input type="text" name="id_costumer" id="id_costumer" class="form-control"
					required autocomplete="off" value="<?=$pengiriman["id_costumer"]; ?>" readonly>
					<br>
					
					<label for="id_barang">Kategori Barang</label>
					<select class="form-control" name="id_barang" id="id_barang">
					<option value="<?=$pengiriman["id_barang"]; ?>"><?=$pengiriman["jenis_barang"]; ?></option>					
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
					required autocomplete="off" value="<?=$pengiriman["nama_barang"]; ?>">
					<br>
					
					<label for="berat_barang">Berat Barang</label>
					<input type="text" name="berat_barang" id="berat_barang" class="form-control"
					required autocomplete="off" value="<?=$pengiriman["berat_barang"]; ?>">
					<br>
					
					<label for="tanggal_kirim">Tanggal Masuk Barang</label>
					<input type="text" name="tanggal_kirim" id="tanggal_kirim" class="form-control"
					required autocomplete="off" value="<?=$pengiriman["tanggal_kirim"]; ?>" readonly>
					<br>
					
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>