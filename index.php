<?php
include "database/koneksi.php";

session_start();

if( !isset($_SESSION["Login"]) ) {
	header("Location: log/Login.php");
	exit;
}



?>
 

<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT Dinamika Qualita Cargo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script src="js/jquery-3.4.1.min.js"></script>
			        <script>
					
			
					$(document).ready(function() {
						$('#barang').change(function() {
							var barang_id = $(this).val();
							
						$.ajax({
							type: 'POST',
							url: 'data/data_pengiriman/bar.php',
							data: 'id_barang='+barang_id,
							success: function(response) {
							$('#nabar').html(response);
							}	
						});
					})
				});

                </script>
				
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>DQC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>PT Dinamika Qualita</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          
             
          <!-- User Account Menu -->
         
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  
  <?php
if ($_SESSION['Admin']){
		$user1 = $_SESSION['Admin'];
	}elseif ($_SESSION['Kepala']){
		$user1 = $_SESSION['Kepala'];
	}

	
	$result1 = mysqli_query($conn,"SELECT * FROM tb_user WHERE id_user = '$user1'");
	
	$user = mysqli_fetch_array($result1);
	
	

?>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	
		<?php
				// jika data yang di terima data 
		if( mysqli_num_rows($result1) > 0 ) {
		echo'<div class="user-panel">
				<div class="pull-left image">
          <img src="img/foto/'. $user["foto"] .'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>'.  $user['nama_lengkap'] .' </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
				</div>';}
		?>

      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
       
		
		<?php 
		$masuk1 = $_SESSION['Admin'];
		if($masuk1){ echo
		'
		<li class="header">HEADER</li>
		<!-- Optionally, you can add icons to the links -->
        <li><a href="?page=barang"><i class="fa fa-link"></i> <span>Data Kategori Barang</span></a></li>
		<li><a href="?page=nabar"><i class="fa fa-link"></i> <span>Data Barang</span></a></li>
		<li><a href="?page=costumer"><i class="fa fa-link"></i> <span>Data Costumer</span></a></li>
		<li><a href="?page=kirim"><i class="fa fa-link"></i> <span>Data Pengiriman</span></a></li>
		
		  <li class="treeview">
          <a href="#">
				<i class="fa fa-dashboard"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  
          <ul class="treeview-menu">
            <li><a href="?page=l_costumer"><i class="fa fa-circle-o"></i>Laporan Data Costumer</a></li>
            <li><a href="?page=l_pengiriman"><i class="fa fa-circle-o"></i>Laporan Data Pengiriman</a></li>
          </ul>
        </li>
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}

		
		$masuk2 = $_SESSION['Kepala'];
	    if($masuk2){ echo
		'
		<li class="header">HEADER</li>
		<!-- Optionally, you can add icons to the links -->
        <li><a href="?page=user"><i class="fa fa-link"></i> <span>Data User</span></a></li>
		  <li class="treeview">
          <a href="#">
				<i class="fa fa-dashboard"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  
          <ul class="treeview-menu">
            <li><a href="?page=l_costumer"><i class="fa fa-circle-o"></i>Laporan Data Costumer</a></li>
            <li><a href="?page=l_pengiriman"><i class="fa fa-circle-o"></i>Laporan Data Pengiriman</a></li>
          </ul>
        </li>
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}
		
		
		?>
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content container-fluid">
	
	 <?php
					
					$page = $_GET["page"];
					$aksi = $_GET["aksi"];
					
					if ($page == "user") {
						if ($aksi == "") {
							include "data/data_user/user.php";
						}elseif ($aksi == "tambah"){
							include "data/data_user/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_user/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_user/ubah.php";
						}
					}
					
					
					if ($page == "barang") {
						if ($aksi == "") {
							include "data/data_barang/barang.php";
						}elseif ($aksi == "tambah"){
							include "data/data_barang/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_barang/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_barang/ubah.php";
						}
					}
					
					if ($page == "nabar") {
						if ($aksi == "") {
							include "data/data_nabar/nabar.php";
						}elseif ($aksi == "tambah"){
							include "data/data_nabar/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_nabar/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_nabar/ubah.php";
						}
					}
					
					if ($page == "costumer") {
						if ($aksi == "") {
							include "data/data_costumer/costumer.php";
						}elseif ($aksi == "tambah"){
							include "data/data_costumer/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_costumer/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_costumer/ubah.php";
						}elseif ($aksi == "kirim") {
							include "data/data_pengiriman/pengiriman.php";
						}
					}
					
					if ($page == "kirim") {
						if ($aksi == "") {
							include "data/data_pengiriman/kirim.php";
						}
					}
					
					if ($page == "pengiriman") {
						if ($aksi == "") {
							include "data/data_pengiriman/pengiriman.php";
						}elseif ($aksi == "tambah"){
							include "data/data_pengiriman/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_pengiriman/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_pengiriman/ubah.php";
						}elseif ($aksi == "hapus2") {
							include "data/data_pengiriman/hapus2.php"; 
						}
					}
					
					if ($page == "l_costumer") {
						if ($aksi == "") {
							include "data/laporan/costumer/costumer.php";
						}
					}
					
					if ($page == "l_pengiriman") {
						if ($aksi == "") {
							include "data/laporan/pengiriman/pengiriman.php";
						}
					}
					
					
					
	?>

     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  })
</script>




<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>