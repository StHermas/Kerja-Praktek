<!-- START: Content -->
<div class="container">

  <div class="card mt-4">
    <div class="card-header">
      <h5>Data Warga</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahWarga" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
        <a href="page/karyawan/laporankaryawan.php" target="_blank" type="button" class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Wilayah</th>
            <th>Status</th>
            <th>Jenis Kelamin</th>
            <th>Pekerejaan</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $warga = viewDatas("SELECT tbl_warga.nama, tbl_warga.id, tbl_wilayah.nama_wilayah, tbl_warga.kelamin, tbl_warga.status_keluarga, tbl_warga.pekerjaan FROM tbl_warga INNER JOIN tbl_wilayah ON tbl_warga.wilayah=tbl_wilayah.id"); ?>
          <?php foreach($warga as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['nama_wilayah']; ?></td>
            <td><?= $data['status_keluarga']; ?></td>
            <td><?= $data['kelamin']; ?></td>
            <td><?= $data['pekerjaan']; ?></td>
            <td>
              <a href="?page=EditWarga&id=<?php echo $data['id']; ?>">
                <span class="fas fa-edit"></span>
              </a>
              <a href="?page=DetailWarga&id=<?php echo $data['id']; ?>">
                <span class="fas fa-cogs"></span>
              </a>
              &nbsp;&nbsp;
              <a href="?page=HapusWarga&id=<?php echo $data['id']; ?>"
                onclick="return confirm('Yakin ingin hapus <?= $data['nama']; ?>');">
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