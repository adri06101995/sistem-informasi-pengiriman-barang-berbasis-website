<?php

require_once "/../../database/koneksi.php";

$id_barang = $_POST['id_barang'];

$kategori = mysqli_query($conn,"SELECT * FROM tb_nabar WHERE id_barang = '$id_barang'");


echo '<option>Pilih Barang</option>';
while($row_nabar = mysqli_fetch_array($kategori)){
	echo '<option value="'.$row_nabar['id_nabar'].'">'.$row_nabar['nama_barang'].'</option>';

}

