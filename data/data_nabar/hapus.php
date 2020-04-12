<?php
require 'functions.php';

$id_nabar = $_GET["id_nabar"];

if(hapus($id_nabar) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=nabar';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=nabar';
			</script>
	
	";

}
?>