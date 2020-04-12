<?php
require 'functions.php';

// ambil data di url
$id_user = $_GET["id_user"];

// query data akun berdasarkan prodi
$user = query("SELECT * FROM tb_user
	WHERE id_user = '$id_user'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=user';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=user';
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
				<h1>UBAH DATA USER</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST" enctype="multipart/form-data">	
                    
					<div class="form-group">
					
					  <input type="hidden" name="fotolama" value="<?= $user["foto"]; ?>" 
					
					<label for="id_user">Id User</label>
					<input type="text" name="id_user" id="id_user" class="form-control"
					required autocomplete="off" value="<?=$user["id_user"]; ?>" readonly>
					<br>
					
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
					required autocomplete="off" value="<?=$user["nama_lengkap"]; ?>">
					<br>
					
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
					required autocomplete="off" value="<?=$user["username"]; ?>">
					<br>
					
					<label for="password">Password</label>
					<input type="text" name="password" id="password" class="form-control"
					required autocomplete="off" value="<?=$user["password"]; ?>">
					<br>
					
					<label for="level">Level</label>
					<select class="form-control" id="level" name="level">
					  <option><?=$user["level"]; ?></option>
					  <option value="Kepala">Kepala</option>
					  <option value="Admin">Admin</option>
					</select>
					<br>
					
					<label for="foto">Foto </label><br>
					<img src="img/foto/<?=$user["foto"]; ?>" width="100"><br><br>
					<input type="file" name="foto" id="foto" class="form-control">
					</li>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>