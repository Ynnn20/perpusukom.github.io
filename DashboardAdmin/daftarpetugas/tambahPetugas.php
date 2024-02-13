<?php 
require "../../config/config.php";
//$informatika = "informatika";
if(isset($_POST["tambah"]) ) {
  
  if(tambahPetugas($_POST) > 0) {
    echo "<script>
    alert('Petugas berhasil ditambahkan');
    document.location.href = 'listpetugas.php';
    </script>";
  }else {
    echo "<script>
    alert('petugas gagal ditambahkan!');
    </script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Tambah Petugas || Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
        }

        nav {
            background-color: #007bff;
            color: white;
        }

        .container-card {
            max-width: 400px;
            margin: 0 auto;
        }

        footer {
            background-color: #f8f9fa;
            color: #495057;
        }
    </style>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/bukulogo-removebg-preview.png" alt="logo" width="120px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-success me-2" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info" href="listpetugas.php">List Petugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-3 mt-5 container-card">
        <div class="card p-2 mt-5">
            <h1 class="text-center fw-bold p-3">Form Tambah Petugas</h1>
            <form action="" method="post" enctype="multipart/form-data" class="mt-3 p-2">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" name="nama_petugas" id="exampleFormControlInput1"
                        placeholder="Nama" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="exampleFormControlInput1"
                        placeholder="Password" required>
                </div>

                <button class="btn btn-success" type="submit" name="tambah">Tambah</button>
                <input type="reset" class="btn btn-warning text-light" value="Reset">
            </form>
        </div>
    </div>

    <footer class="mt-5 shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-between">
            <p class="mt-2">Created by <span class="text-primary"> Hasyim Syahputra</span></p>
            <p class="mt-2">versi 1.0</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
