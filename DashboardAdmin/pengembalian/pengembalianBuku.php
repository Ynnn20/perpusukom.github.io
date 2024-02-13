<?php 
//Halaman pengelolaan pengembalian Buku Perustakaaan
require "../../config/config.php";
$dataPeminjam = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, member.kelas, member.jurusan, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Kelola Pengembalian Buku || Admin</title>
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

        .action {
            display: flex;
            justify-content: center;
        }

        footer {
            background-color: #f8f9fa;
            color: #495057;
        }
    </style>
</head>

<body>

    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
        <div class="container-fluid p-1">
            <a class="navbar-brand" href="#">
                <img src="../../assets/bukulogo-removebg-preview.png" alt="logo" width="120px">
            </a>
            <a class="btn btn-success" href="../dashboardAdmin.php">Dashboard</a>
        </div>
    </nav>

    <div class="container mt-5">
        <caption>List of Pengembalian</caption>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Id Pengembalian</th>
                        <th>Id Buku</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Nama Admin</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Keterlambatan</th>
                        <th>Denda</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php foreach ($dataPeminjam as $item) : ?>
                    <tr>
                        <td><?= $item["id_pengembalian"]; ?></td>
                        <td><?= $item["id_buku"]; ?></td>
                        <td><?= $item["judul"]; ?></td>
                        <td><?= $item["kategori"]; ?></td>
                        <td><?= $item["nisn"]; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["kelas"]; ?></td>
                        <td><?= $item["jurusan"]; ?></td>
                        <td><?= $item["nama_admin"]; ?></td>
                        <td><?= $item["buku_kembali"]; ?></td>
                        <td><?= $item["keterlambatan"]; ?></td>
                        <td><?= $item["denda"]; ?></td>
                        <td>
                            <div class="action">
                                <a href="deletePengembalian.php?id=<?= $item["id_pengembalian"]; ?>"
                                    class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i
                                        class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <footer class="fixed-bottom">
        <div class="container-fluid d-flex justify-content-between p-3">
            <p class="mt-2">Created by <span class="text-primary"> Hasyim Syahputra</span></p>
            <p class="mt-2">Versi 1.0</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

