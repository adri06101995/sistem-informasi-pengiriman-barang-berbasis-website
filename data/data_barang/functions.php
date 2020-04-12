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
	$id_barang = htmlspecialchars($data["id_barang"]);
	$jenis_barang = htmlspecialchars($data["jenis_barang"]);
	
	// query insert data
	$query = "INSERT INTO tb_barang
				VALUES
			('$id_barang','$jenis_barang')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_barang = htmlspecialchars($data["id_barang"]);
	$jenis_barang = htmlspecialchars($data["jenis_barang"]);
	
	// query insert data
			
	$query = "UPDATE tb_barang SET
				jenis_barang = '$jenis_barang'
				WHERE id_barang = '$id_barang'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_barang) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'");
	return mysqli_affected_rows($conn);
}


?>