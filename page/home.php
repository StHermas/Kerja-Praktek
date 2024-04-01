<?php 
  $query = "SELECT *,(YEAR(CURDATE()) - YEAR(tgl_lahir)) AS umur FROM tbl_warga
  INNER JOIN tbl_wilayah
  ON tbl_warga.wilayah=tbl_wilayah.kode_wilayah
  WHERE MONTH(tgl_lahir) = MONTH(CURDATE())
  AND keterangan!='Meninggal'
  ORDER BY umur DESC;"
?>

<!-- Awal Isi Halaman -->
<div class="container container-fluid">

	<!-- START: Category -->
	<div class="card mt-4 mb-4">
		<div class="card-body">
			<h5 class="card-title">Dashboard</h5>
			<div class="row">

				<div class="col-md">
					<div class="card text-white bg-primary" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-user"></i>
								<span class="text-right"><?= numData("tbl_warga"); ?></span>
							</h1>
							<p class="card-text">Warga</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-warning" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-users"></i>
								<span class="text-right"><?= numData('tbl_keluarga'); ?></span>
							</h1>
							<p class="card-text">Keluarga</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-success" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-user"></i>
								<span class="text-right"><?= numQueryData("SELECT * FROM `tbl_warga` WHERE `keterangan` = 'Aktif'");?></span>
							</h1>
							<p class="card-text">Warga Aktif</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-info" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-user"></i>
								<span class="text-right"><?= numQueryData("SELECT * FROM `tbl_warga` WHERE `keterangan` = 'Pasif'"); ?></span>
							</h1>
							<p class="card-text">Warga Pasif</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-info" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-cross"></i>
								<span class="text-right"><?= numQueryData("SELECT * FROM `tbl_warga` WHERE `keterangan` = 'Meninggal'"); ?></span>
							</h1>
							<p class="card-text">Warga Meninggal</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END: Category -->

	<!-- START: Data Transaksi Terakhir -->
	<div class="card mb-4">
		<div class="card-body">
			<h5 class="card-title">Warga yang Berulang tahun di Bulan ini</h5>
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Wilayah</th>
						<th>Tanggal Lahir</th>
						<th>Umur</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php $transaksi = viewDatas($query); ?>
					<?php foreach($transaksi as $data) : ?>
					<tr>
						<td><?= $no++;?></td>
						<td><?= $data['nama']; ?></td>
						<td><?= $data['nama_wilayah']; ?></td>
						<td><?= $data['tgl_lahir']; ?></td>
						<td><?= $data['umur']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- END: Data Transaksi Terakhir -->

</div>
<!-- Akhir Isi Halaman -->