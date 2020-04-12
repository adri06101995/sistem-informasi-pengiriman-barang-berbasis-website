<?php
// koneksi ke database
include "/database/koneksi.php";



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
	$id_costumer = htmlspecialchars($data["id_costumer"]);
	$nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
	$tanggal_terdaftar = htmlspecialchars($data["tanggal_terdaftar"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
	
	// query insert data
	$query = "INSERT INTO costumer
				VALUES
			('$id_costumer','$nama_lengkap','$tanggal_terdaftar',
			'$alamat','$no_hp','$nama_perusahaan')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}



function ubah($data) {
	global $conn;
	$id_costumer = htmlspecialchars($data["id_costumer"]);
	$nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
	$tanggal_terdaftar = htmlspecialchars($data["tanggal_terdaftar"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
	
	// query insert data
			
	$query = "UPDATE costumer SET
				nama_lengkap = '$nama_lengkap',
				tanggal_terdaftar = '$tanggal_terdaftar',
				alamat = '$alamat',
				no_hp = '$no_hp',
				nama_perusahaan = '$nama_perusahaan'
				WHERE id_costumer = '$id_costumer'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}


function hapus($id_costumer) {
	global $conn;
	mysqli_query($conn, "DELETE FROM costumer WHERE id_costumer = '$id_costumer'");
	return mysqli_affected_rows($conn);
}




?>