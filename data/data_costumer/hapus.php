<<?php
require 'functions.php';

$id_costumer = $_GET["id_costumer"];

if(hapus($id_costumer) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=costumer';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=costumer';
			</script>
	
	";

}
?>