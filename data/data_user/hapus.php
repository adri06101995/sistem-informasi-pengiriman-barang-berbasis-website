<?php
require 'functions.php';

$id_user = $_GET["id_user"];

if(hapus($id_user) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=user';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=user';
			</script>
	
	";

}
?>