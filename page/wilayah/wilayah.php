<!-- START: Content -->
<div class="container">

  <div class="card mt-4 mb-4">
    <div class="card-header">
      <h5>Data Wilayah</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahWilayah" type="button" class="btn btn-sm btn-primary mr-3"><i
            class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
        <a href="page/paket/laporanpaket.php" target="_blank" type="button" class="btn btn-sm btn-info mr-3"><i
            class="fas fa-download fa-sm text-white"></i> Unduh PDF</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Wilayah</th>
            <th>Nama Wilayah</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $wilayah = viewAllData("tbl_wilayah"); ?>
          <?php foreach($wilayah as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['kode_wilayah']; ?></td>
            <td><?= $data['nama_wilayah']; ?></td>
            <td>
              <a href="?page=EditWilayah&id=<?php echo $data['id']; ?>">
                <span class="fas fa-edit"></span>
              </a>
              &nbsp;&nbsp;
              <?php 
                $id = $data['id'];
                $result = viewDatas("SELECT * FROM `tbl_warga` WHERE tbl_warga.wilayah = '$id'");
                if ( count($result) > 0 ) { ?>
                <a href="#"
                  onclick="return confirm('Data sedang digunakan');">
                  <span class="fas fa-trash"></span>
              <?php } else { ?>
                <a href="?page=HapusWilayaht&id=<?php echo $data['id']; ?>"
                  onclick="return confirm('Yakin ingin hapus <?= $data['nama_wilayah']; ?>');">
                  <span class="fas fa-trash"></span>              
              <?php } ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- END: Content -->