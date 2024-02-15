<?php
// Halaman pengelolaan peminjaman buku perpustakaan
require "../../config/config.php";
$dataPeminjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, member.kelas, member.jurusan, peminjaman.id_admin,  peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian 
FROM peminjaman 
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Kelola Peminjaman Buku || Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
        }

        nav {
            background-color: #007bff;
            color: white;
        }

        table {
            background-color: #fff;
        }

        th,
        td {
            text-align: center;
        }

        footer {
            background-color: #f8f9fa;
            color: #495057;
        }
    </style>
</head>

<body>

    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
        <div class="container-fluid p-2">
            <a class="navbar-brand" href="#">
                <img src="../../assets/bukulogo-removebg-preview.png" alt="logo" width="120px">
            </a>
            <h3 style="color: black;">Daftar Peminjaman</h3>
            <a class="btn btn-success" href="../dashboardAdmin.php">Dashboard</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="mb-4">List of Peminjaman</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Id Peminjaman</th>
                        <th>Id Buku</th>
                        <th>Judul Buku</th>
                        <th>NISN Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Id Admin</th>
                        <th>Tanggal Peminjaman</th>
                    </tr>
                </thead>
                <?php foreach ($dataPeminjam as $item) : ?>
                    <tr>
                        <td><?= $item["id_peminjaman"]; ?></td>
                        <td><?= $item["id_buku"]; ?></td>
                        <td><?= $item["judul"]; ?></td>
                        <td><?= $item["nisn"]; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["kelas"]; ?></td>
                        <td><?= $item["jurusan"]; ?></td>
                        <td><?= $item["id_admin"]; ?></td>
                        <td><?= $item["tgl_peminjaman"]; ?></td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
