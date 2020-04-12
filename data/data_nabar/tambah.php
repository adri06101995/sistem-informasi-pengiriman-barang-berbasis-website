<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_nabar FROM tb_nabar ORDER BY id_nabar DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_nabar'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "NB"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "NB"."0".$tambah;
}else{
	$format1 = "NB".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=nabar';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=nabar';
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
				<h1>TAMBAH DATA BARANG</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_nabar">Id Barang</label>
					<input type="text" name="id_nabar" id="id_nabar" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="id_barang">Kategori Barang</label>
					<select class="form-control" name="id_barang" id="id_barang">
					<option>-- Pilih Kategori --</option>
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
					required autocomplete="off">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  