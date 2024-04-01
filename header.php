<?php
	// Menampilkan nama user
  $id = $_SESSION['id'];
  $result = mysqli_query($koneksi, "SELECT * FROM tbl_autentikasi WHERE id = '$id'");
  $user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrasi GKJW Mlaten</title>

	<link rel="shortcut icon" href="asset/img/logo.jpg" type="image/x-icon">

	<!-- Boostrap 4 -->
	<link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
	<!-- Font Awesome free-->
	<link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
	<!-- Datatables with style bootstrap 4 -->
	<link rel="stylesheet" href="asset/vendor/datatables-b4/datatables.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">
			<img src="asset/img/logo.jpg" width="30" height="30" alt="">
			GKJW Mlaten
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ml-3">
					<a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="?page=Warga"><i class="fas fa-users"></i> Data Warga</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="?page=Keluarga"><i class="fas fa-users"></i> Data Keluarga</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="?page=Wilayah"><i class="fas fa-flag"></i> Data Wilayah</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link " href="?page=Pelayan"><i class="fas fa-suitcase"></i> Data Pelayan</a>
				</li>

			</ul>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline"><?= $user['nama']; ?></span>
					</a>

					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Keluar
						</a>
					</div>
				</li>
			</ul>

		</div>
	</nav>