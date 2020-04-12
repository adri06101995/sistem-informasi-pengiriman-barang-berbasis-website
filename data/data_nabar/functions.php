<?php
// koneksi ke database
include "database/koneksi.php";



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
	$id_nabar = htmlspecialchars($data["id_nabar"]);
	$id_barang = htmlspecialchars($data["id_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	
	// query insert data
	$query = "INSERT INTO tb_nabar
				VALUES
			('$id_nabar','$id_barang',
			'$nama_barang')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_nabar = htmlspecialchars($data["id_nabar"]);
	$id_barang = htmlspecialchars($data["id_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	
	// query insert data
			
	$query = "UPDATE tb_nabar SET
				id_barang = '$id_barang',
				nama_barang = '$nama_barang'
				WHERE id_nabar = '$id_nabar'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_nabar) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_nabar WHERE id_nabar = '$id_nabar'");
	return mysqli_affected_rows($conn);
}


?>