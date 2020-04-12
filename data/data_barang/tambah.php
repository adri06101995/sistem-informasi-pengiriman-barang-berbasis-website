<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_barang FROM tb_barang ORDER BY id_barang DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_barang'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "BR"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "BR"."0".$tambah;
}else{
	$format1 = "BR".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=barang';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=barang';
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
				<h1>TAMBAH DATA KATEGORI BARANG</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_barang">Id Kategori Barang</label>
					<input type="text" name="id_barang" id="id_barang" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="jenis_barang">Kategori Barang</label>
					<input type="text" name="jenis_barang" id="jenis_barang" class="form-control"
					required autocomplete="off">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  