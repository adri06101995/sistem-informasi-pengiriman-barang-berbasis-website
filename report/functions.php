<?php
// koneksi ke database
include "../database/koneksi.php";



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	$id_user = htmlspecialchars($data["id_user"]);
	$nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$level = htmlspecialchars($data["level"]);

	//upload foto
	$foto = upload(); 
	if( !$foto){
		return false;
	}
	
	// query insert data
	$query = "INSERT INTO tb_user
				VALUES
			('$id_user','$nama_lengkap','$username',
			'$password','$level','$foto')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function upload() {
	
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];
	
	//cek apakah tidak ada gambar yang di upload
	if( $error === 4) {
		echo "<script>
				alert('pilih foto terlebih dahulu');
			  </script>";
		return false;
	}
	
	//cek apakah yang diupload adalah gambar
	$ekstensifotoValid = ['jpg','jpeg','png'];
	$ekstensifoto = explode('.', $namaFile);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if( !in_array($ekstensifoto, $ekstensifotoValid) ) {
		echo "<script>
				alert('yang anda upload bukan foto!');
			  </script>";
		return false;
	}
	
	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}	
	
	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensifoto;
	
	
	move_uploaded_file($tmpName,'img/foto/'.$namaFileBaru);
	
	return $namaFileBaru;
		
}



function ubah($data) {
	global $conn;
	$id_user = htmlspecialchars($data["id_user"]);
	$nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$level = htmlspecialchars($data["level"]);
	$fotolama = htmlspecialchars($data["fotolama"]);
	
	// cek apakah user pilih foto baru atau tidak 
	if( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotolama;
	} else {
		$foto = upload();
	}
	
	// query insert data
			
	$query = "UPDATE tb_user SET
				nama_lengkap = '$nama_lengkap',
				username = '$username',
				password = '$password',
				level = '$level',
				foto = '$foto'
				WHERE id_user = '$id_user'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}


function hapus($id_user) {
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
	$row = mysqli_fetch_array($sql);
	unlink("img/foto/$row[foto]");
	
	mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id_user'");
	return mysqli_affected_rows($conn);
}




?>