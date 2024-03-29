<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM member");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Member terdaftar</title>
     <style>
      .table-responsive {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.table {
  border-collapse: collapse;
  width: 100%;
}

.table th,
.table td {
  padding: 10px;
  text-align: center;
}

.table th {
  background-color: #f8f9fa; /* Warna latar belakang header */
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f3f4f6; /* Warna latar belakang baris ganjil */
}

.table-hover tbody tr:hover {
  background-color: #e2e8f0; /* Warna latar belakang saat dihover */
}

.action {
  display: flex;
  justify-content: center;
}

.btn {
  padding: 5px 10px;
  font-size: 14px;
}

.btn-danger {
  background-color: #dc3545; /* Warna tombol hapus */
  color: #fff;
  border: none;
  transition: background-color 0.3s;
}

.btn-danger:hover {
  background-color: #c82333; /* Warna saat tombol hapus dihover */
}
     </style>
  </head>
  <body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/bukulogo-removebg-preview.png" alt="logo" width="120px">
        </a>
        <h3 style="color: black;">Daftar Member</h3>
        <a class="btn btn-success" href="../dashboardAdmin.php">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <!--search engine --->
     <form action="" method="post" class="mt-5">
       <div class="input-group d-flex justify-content-end mb-3">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="Cari Siswa">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <caption>List of Member</caption>
      <div class="table-responsive mt-3">
      <table class="table table-striped table-hover">
        <thead class="text-center">
            <tr>
                <th class="bg-white text-dark">Nisn</th>
                <th class="bg-white text-dark">Kode</th>
                <th class="bg-white text-dark">Nama</th>
                <th class="bg-white text-dark">Jenis Kelamin</th>
                <th class="bg-white text-dark">Kelas</th>
                <th class="bg-white text-dark">Jurusan</th>
                <th class="bg-white text-dark">No Telepon</th>
                <th class="bg-white text-dark">Pendaftaran</th>
                <th class="bg-white text-dark">Delete</th>
            </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr>
        <td><?=$item["nisn"];?></td>
        <td><?=$item["kode_member"];?></td>
        <td><?=$item["nama"];?></td>
        <td><?=$item["jenis_kelamin"];?></td>
        <td><?=$item["kelas"];?></td>
        <td><?=$item["jurusan"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["tgl_pendaftaran"];?></td>
        <td>
          <div class="action">
             <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data member ?');"><i class="fa-solid fa-trash"></i></a>
           </div>
        </td>
       </tr>
      <?php endforeach;?>
    </table>
    </div>
  </div>
  
  <footer class="fixed-bottom shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Hasyim Syahputra</span></p>
      <p class="mt-2">versi 1.0</p>
    </div>
  </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>