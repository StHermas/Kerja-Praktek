<?php 
  $query = "SELECT tbl_pekerjaan.id, tbl_karyawan.nama, tbl_transaksi.qty, tbl_status.nama_status, tbl_transaksi.id
            FROM tbl_pekerjaan 
            INNER JOIN tbl_karyawan 
            ON tbl_pekerjaan.karyawan = tbl_karyawan.id 
            INNER JOIN tbl_transaksi 
            ON tbl_pekerjaan.transaksi = tbl_transaksi.id
            INNER JOIN tbl_status
            ON tbl_pekerjaan.status = tbl_status.id_status"
?> 

<!-- START:Content-->
<div class="container">

  <div class="card mt-4 mb-4">
    <div class="card-header">
      <h5>Data Pelayan</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahPekerjaan" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Pekerjaan</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>ID Transaksi</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $pekerjaan = viewDatas($query); ?>
          <?php foreach($pekerjaan as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['id']; ?></td>
            <td><?= $data['qty']; ?> kg</td>
            <td><?= $data['nama_status']; ?></td>
            <td>
            <a href="?page=EditPekerjaan&id=<?php echo $data['id']; ?>">
                <span class="fas fa-edit"></span>
              </a>
              &nbsp;&nbsp;
              <a href="?page=HapusPekerjaan&id=<?php echo $data['id']; ?>"
                onclick="return confirm('Yakin ingin hapus Pekerjaan <?= $data['id']; ?>');">
                <span class="fas fa-trash"></span>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- END:Content-->