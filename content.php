<?php 
  switch (@$_GET['page']) {

		// Warga
    case 'Warga':
			include 'page/warga/warga.php';
			break;
		case 'TambahWarga':
			include 'page/warga/tambahwarga.php';
			break;
		case 'EditWarga':
			include 'page/warga/editwarga.php';
			break;
		case 'HapusWarga':
			include 'page/warga/hapuswarga.php';
			break;
		case 'DetailWarga':
			include 'page/warga/detailwarga.php';
			break;

		// Wilayah
		case 'Wilayah':
			include 'page/wilayah/wilayah.php';
			break;
		case 'TambahWilayah':
			include 'page/wilayah/tambahwilayah.php';
			break;
		case 'EditWilayah':
			include 'page/wilayah/editwilayah.php';
			break;
		case 'HapusWilayah':
			include 'page/wilayah/hapuswilayah.php';
			break;

		// Keluarga
		case 'Keluarga':
			include 'page/keluarga/keluarga.php';
			break;
		case 'TambahKeluarga':
			include 'page/keluarga/tambahkeluarga.php';
			break;
		case 'EditKeluarga':
			include 'page/keluarga/editkeluarga.php';
			break;
		case 'HapusKeluarga':
			include 'page/keluarga/hapuskeluarga.php';
			break;

		// Pelayan
		case 'Pelayan':
			include 'page/pelayan/pelayan.php';
			break;
		case 'TambahTransaksi':
			include 'page/pelayan/tambahpelayan.php';
			break;
		case 'EditTransaksi':
			include 'page/pelayan/editpelayan.php';
			break;
		case 'HapusTransaksi':
			include 'page/pelayan/hapuspelayan.php';
			break;			

		// User
		case 'Profil':
			include 'page/user/profil.php';
			break;
		case 'EditProfil':
			include 'page/user/editprofil.php';
			break;
		case 'UbahPassword':
			include 'page/user/ubahpassword.php';
			break;

		// Pekerjaan
		case 'Pekerjaan':
			include 'page/pekerjaan/pekerjaan.php';
			break;
		case 'TambahPekerjaan':
			include 'page/pekerjaan/tambahpekerjaan.php';
			break;	
		case 'HapusPekerjaan':
			include 'page/pekerjaan/hapuspekerjaan.php';
			break;
		case 'EditPekerjaan':
			include 'page/pekerjaan/editpekerjaan.php';
			break;
		case 'TambahStatus':
			include 'page/pekerjaan/tambahstatus.php';
			break;

    default :
      include 'page/home.php';
      break;
  }
?>