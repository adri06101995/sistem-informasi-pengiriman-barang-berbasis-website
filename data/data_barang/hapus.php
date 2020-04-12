<?php
require 'functions.php';

$id_barang = $_GET["id_barang"];

if(hapus($id_barang) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=barang';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=barang';
			</script>
	
	";

}
?>