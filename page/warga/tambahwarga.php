<?php 
	// ID otomatis
	$autoId = KodeWarga('tbl_warga', 'G03');;

	if( isset($_POST['submit'])) {
		$id 					= ($_POST['id']);
		$tanggal 			= strip_tags($_POST['tanggal']);
		$idpelanggan	= strip_tags($_POST['id_pelanggan']);
		$kdpaket			= strip_tags($_POST['kd_paket']);
		$qty 					= strip_tags($_POST['qty']);
		$biaya 				= strip_tags($_POST['biaya']);
		$bayar				= strip_tags($_POST['bayar']);
		$kembalian 		= strip_tags($_POST['kembalian']);
		$query 				= "INSERT INTO tbl_transaksi VALUES ('$id', '$tanggal', '$idpelanggan', '$kdpaket', $qty, $biaya, $bayar, $kembalian)";

		if( queryData($query) > 0 ){
			echo "<script>
							alert('Data berhasil ditambahkan');
							document.location.href = '?page=Transaksi';
						</script>";
		} else {
			echo "<script>
							alert('Data gagal ditambahkan');
							document.location.href = '?page=Transaksi';
						</script>";
		}
	}

	$query2 = "SELECT * FROM tbl_wilayah";
	$status2 = mysqli_query($koneksi,$query2);

	$query3 = "SELECT * FROM `tbl_keluarga` ORDER BY `tbl_keluarga`.`kepala` ASC";
	$status3 = mysqli_query($koneksi,$query3);
?>


<!-- START: Content -->
<div class="container container-fluid">

	<div class="card mt-4 mb-4">
		<h5 class="card-header d-flex flex-row align-items-center justify-content-between">
			<a>Tambah Data Warga</a>
			<a href="?page=Warga" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-chevron-left fa-sm fa-fw"></i>
			</a>
		</h5>
		<div class="card-body">

			<form method="post" action="">
				<div class="form-group row">
					<label for="id" class="col-sm-2 col-form-label">Kode Warga</label>
					<div class="col-sm-10">
						<input type="text" class="form-control-plaintext" id="id" name="id" value="<?= $autoId; ?>" required
							readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="qty" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama" name="nama" required>
					</div>
				</div>
				<div class="form-group row">
                	<label for="kode_kk" class="col-sm-2 col-form-label">Kepala Keluarga</label>
                		<div class="col-sm-10">
                   			<select id="kode_kk" name="kode_kk" placeholder="kode_kk" class="form-control" required>
                        		<?php
                            		while ($status4 = mysqli_fetch_array($status3, MYSQLI_ASSOC)):;
                        		?>
                        		<option value="<?php echo $status4["kode_kk"];?>">
                        			<?php echo $status4["kepala"]; ?>
                         		</option>
                        		<?php
                            		endwhile;
                        		?>
                    		</select>
                		</div>
           		</div>
				<div class="form-group row">
                	<label for="kelompok" class="col-sm-2 col-form-label">Kelompok</label>
                		<div class="col-sm-10">
                   			<select id="wilayah" name="wilayah" placeholder="wilayah" class="form-control" required>
                        		<?php
                            		while ($status1 = mysqli_fetch_array($status2, MYSQLI_ASSOC)):;
                        		?>
                        		<option value="<?php echo $status1["id"];?>">
                        			<?php echo $status1["nama_wilayah"]; ?>
                         		</option>
                        		<?php
                            		endwhile;
                        		?>
                    		</select>
                		</div>
           		</div>
				<div class="form-group row">
					<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis_kelamin" class="form-control" required>
							<option value="1">Laki-laki</option>
							<option value="2">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="qty" class="col-sm-2 col-form-label">Nomor Induk</label>
					<div class="col-sm-10">
						<input type="number" min="1" class="form-control" id="nomor_induk" name="nomor_induk" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="kd_paket" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input type="text" class="form-control" id="kd_paket" name="kd_paket" placeholder="Pilih Paket" readonly
								required>
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalPaket"><i
										class="fas fa-search fa-sm"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="harga" class="col-sm-2 col-form-label">Sekolah</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="harga" name="harga" onkeyup="jumlahBiaya();" required readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="qty" class="col-sm-2 col-form-label">Quantity</label>
					<div class="col-sm-10">
						<input type="number" step=".01" min="1" class="form-control" id="qty" name="qty" onkeyup="jumlahBiaya();" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="biaya" name="biaya" onkeyup="jumlahKembalian();" required readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
					<div class="col-sm-10">
						<input type="number" min="0"  class="form-control" id="bayar" name="bayar" onkeyup="jumlahKembalian();"required>
					</div>
				</div>
				<div class="form-group row">
					<label for="kembalian" class="col-sm-2 col-form-label">Kembalian</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="kembalian" name="kembalian" required readonly>
					</div>
				</div>
				<div class="card-footer text-center">
					<button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- START: Content -->


<!-- Modal Pelanggan -->
<div class="modal fade bd-example-modal-lg" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="modal"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="modal">Pilih Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<div class="d-sm-flex mb-4">
							<a href="?page=TambahPelanggan" target="_blank" type="button"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
									class="fas fa-plus fa-sm text-white-50"></i> Tambah Pelanggan</a>
							<a href="?page=Pelanggan" target="_blank" type="button"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
									class="fas fa-forward fa-sm text-white-50"></i> Lihat Pelanggan</a>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>#</th>
										<th>Id Pelanggan</th>
										<th>Nama Pelanggan</th>
										<th>Alamat Pelanggan</th>
										<th>Nomor Handphone</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php $pelanggan = viewAllData("tbl_pelanggan"); ?>
									<?php foreach($pelanggan as $data) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td>
											<button id="pilih-pelanggan" class="btn btn-sm btn-success pilih-pelanggan"
												data-pelanggan="<?= $data['id'] ?>">
												<i class="fas fa-check-double fa-sm"></i>
											</button>
										</td>
										<td><?= $data['id']; ?></td>
										<td><?= $data['nama']; ?></td>
										<td><?= $data['alamat']; ?></td>
										<td><?= $data['no_hp']; ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- Modal Paket -->
<div class="modal fade bd-example-modal-lg" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="modal"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="modal">Pilih Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<div class="d-sm-flex mb-4">
							<a href="?page=TambahPaket" target="_blank" type="button"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
									class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket</a>
							<a href="?page=Paket" target="_blank" type="button"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
									class="fas fa-forward fa-sm text-white-50"></i> Lihat Paket</a>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTables2" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>#</th>
										<th>Id Paket</th>
										<th>Nama Paket</th>
										<th>Harga Per Kilo</th>
										<th>Deskripsi Paket</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php $paket = viewAllData("tbl_paket"); ?>
									<?php foreach($paket as $data) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td>
											<button id="pilih-paket" class="btn btn-sm btn-success pilih-paket"
												data-kdpaket="<?= $data['id'] ?>" data-harga="<?= $data['harga_kilo'] ?>">
												<i class="fas fa-check-double fa-sm"></i>
											</button>
										</td>
										<td><?= $data['id']; ?></td>
										<td><?= $data['paket']; ?></td>
										<td><?= $data['harga_kilo']; ?></td>
										<td><?= $data['deskripsi']; ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>