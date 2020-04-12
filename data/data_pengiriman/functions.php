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
	$id_pengiriman = htmlspecialchars($data["id_pengiriman"]);
	$id_costumer = htmlspecialchars($data["id_costumer"]);
	$id_barang = htmlspecialchars($data["barang"]);
	$nama_barang = htmlspecialchars($data["nabar"]);
	$pcs = htmlspecialchars($data["pcs"]);
	$berat = htmlspecialchars($data["berat"]);
	$bertotal = $pcs * $berat;
	$tanggal_kirim = htmlspecialchars($data["tanggal_kirim"]);
	$kode = htmlspecialchars($data["kode"]);
	
	
	
	// query insert data
	$query = "INSERT INTO tb_pengiriman
				VALUES
			('$id_pengiriman','$id_costumer','$id_barang',
			'$nama_barang','$pcs','$berat','$bertotal', 
			'$tanggal_kirim','$kode')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function kembali($data){
	global $conn;
	$kode = htmlspecialchars($data["kode"]);
	
	// query insert data
	$query = "INSERT INTO kd_pengiriman
				VALUES
			('$kode')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}


function ubah($data) {
    $id_pengiriman = htmlspecialchars($data["id_pengiriman"]);
	$id_costumer = htmlspecialchars($data["id_costumer"]);
	$id_barang = htmlspecialchars($data["id_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$berat_barang = htmlspecialchars($data["berat_barang"]);
	$tanggal_kirim = htmlspecialchars($data["tanggal_kirim"]);
	
	// query insert data
			
	$query = "UPDATE tb_pengiriman SET
				id_costumer = '$id_costumer',
				id_barang = '$id_barang',
				nama_barang = '$nama_barang',
				berat_barang = '$berat_barang',
				tanggal_kirim = '$tanggal_kirim'
				WHERE id_pengiriman = '$id_pengiriman'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}


function hapus($id_pengiriman) {
	global $conn;
	
	mysqli_query($conn, "DELETE FROM tb_pengiriman WHERE id_pengiriman = '$id_pengiriman'");
	return mysqli_affected_rows($conn);
}




?>