<?php 
  $query = "SELECT * 
            FROM tbl_keluarga
            INNER JOIN tbl_wilayah ON tbl_keluarga.wilayah=tbl_wilayah.id"
?>


<!-- START: Content -->
<div class="container">

  <div class="card mt-4 mb-4">
    <div class="card-header">
      <h5>Data Keluarga</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahKeluarga" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
        <a href="page/transaksi/laporantransaksi.php" target="_blank" type="button" class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Download PDF</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode Keluarga</th>
            <th>Alamat</th>
            <th>Kelompok</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $transaksi = viewDatas($query); ?>
          <?php foreach($transaksi as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['kepala']; ?></td>
            <td><?= $data['kode_kk']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['nama_wilayah']; ?></td>
            <td>
              <a href="?page=EditTransaksi&id=<?php echo $data['id']; ?>">
                <span class="fas fa-edit"></span>
              </a>
              &nbsp;&nbsp;
              <a href="?page=HapusTransaksi&id=<?php echo $data['id']; ?>"
                onclick="return confirm('Yakin ingin hapus <?= $data['id']; ?>');">
                <span class="fas fa-trash"></span>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- END: Content -->