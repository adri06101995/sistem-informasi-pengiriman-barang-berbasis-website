<?php
require 'functions.php';	
	

$no = mysqli_query($conn, "SELECT id_user FROM tb_user ORDER BY id_user DESC");

$id_user = mysqli_fetch_array($no);
$kode = $id_user['id_user'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "Id"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "Id"."0".$tambah;
}else{
	$format1 = "Id".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=user';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=user';
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
				<h1>TAMBAH DATA USER</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST" enctype="multipart/form-data">	
                    
					<div class="form-group">
								
					<label for="id_user">Id_user</label>
					<input type="text" name="id_user" id="id_user" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off">
					<br>
					
					
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="password">Password</label>
					<input type="text" name="password" id="password" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="level">Level</label>
					<select class="form-control" id="level" name="level">
					  <option>-- Pilih--</option>
					  <option value="Kepala">Kepala</option>
					  <option value="Admin">Admin</option>
					</select>
					<br>
					
					<label for="foto">foto</label>
					<input type="file" name="foto" id="foto" class="form-control"
					required>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  