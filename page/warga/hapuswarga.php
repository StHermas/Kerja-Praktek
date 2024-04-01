<?php 
  // Jika tidak ada id di url
  if (!isset($_GET['id'])) {
    header("Location: ?page=Warga");
    exit;
  }

  // Mengambil id dari url
  $id = $_GET['id'];

  if (deleteData('tbl_warga', $id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=Warga';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal dihapus');
          </script>";  
  }
?>