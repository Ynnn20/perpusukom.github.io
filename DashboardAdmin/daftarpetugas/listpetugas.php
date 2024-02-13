<?php
session_start();

if (!isset($_SESSION["signIn"])) {
    header("Location: ../../sign/admin/sign_in.php");
    exit;
}

require "../../config/config.php";

$petugas = queryReadData("SELECT * FROM petugas");

if (isset($_POST["search"])) {
    $petugas = searchPetugas($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Member Terdaftar</title>
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
                        <a class="btn btn-success" href="tambahPetugas.php">Tambah Petugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <form action="" method="post">
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari data member...">
                <button class="btn btn-light" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        <h5 class="mt-4">Daftar Petugas</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>Password</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php foreach ($petugas as $item) : ?>
                    <tr>
                        <td><?= $item["nama_petugas"]; ?></td>
                        <td><?= $item["password"]; ?></td>
                        <td>
                            <a href="deletePetugas.php?id=<?= $item["idPetugas"]; ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data petugas ?');"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-between">
            <p class="mt-2">Created by <span class="text-primary"> Hasyim Syahputra</span></p>
            <p class="mt-2">Versi 1.0</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
