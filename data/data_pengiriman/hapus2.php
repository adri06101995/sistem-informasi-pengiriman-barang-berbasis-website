<?php
require 'functions.php';

$id_pengiriman = $_GET["id_pengiriman"];

if(hapus($id_pengiriman) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				window.location.replace();
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
			</script>
	
	";

}
?>