<?php 
require "../../config/config.php"; 

$idPetugas = $_GET["id"];
if(deletePetugas($idPetugas) > 0) {
    echo "<script>
    alert('Petugas berhasil dihapus!');
    document.location.href = 'listPetugas.php';
    </script>";
  }else {
    echo "<script>
    alert('Petugas gagal dihapus!');
    document.location.href = 'listPetugas.php';
    </script>";
}
?>
