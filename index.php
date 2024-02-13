<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>

    <!-- Add this in the <head> section -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(to bottom, #198754, #198754);
        margin: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Roboto', sans-serif;
    }

    .navbar {
        background-color: #003366;
    }

    .card {
        width: 20rem;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body a.btn {
        transition: transform 0.3s ease-in-out;
    }

    .card-body a.btn:hover {
        transform: translateY(-5px);
    }
</style>


  </head>
  <body>
  <div class="container p-5">
    <div class="d-flex justify-content-center">
      <div class="card" style="width: 25rem;">
        <img src="https://i.pinimg.com/736x/19/02/8f/19028f0053fa0cb690585da89be32d73.jpg" class="card-img-top" alt="logo">
        <h1 class="card-text text-center" style="color: green;">AKSES LOGIN PERPUSTAKAAN</h1>
        <!--<hr>
        <div class="card-body pt-2">
        <h3 class="card-text text-center">Portal Login Perpustakaan</h3>
        <p class="card-text text-center">Silahkan pilih halaman login sesuai dengan status Anda</p>
      </div>-->
      <div class="card-body pt-2">
        <p class="card-text text-center">Silahkan pilih halaman login sesuai dengan status Anda</p>
        <hr>
        <div class="row gap-2 p-2">
          <a class="btn btn-success mb-2" href="sign/admin/sign_in.php">Admin</a>
          <a class="btn btn-success mb-2" href="sign/petugas/sign_in.php">Petugas</a>
          <a class="btn btn-success mb-3" href="sign/member/sign_in.php">Siswa</a>
          <!--<a class="btn btn-danger" href="index.php">Kembali</a>-->
        </div>
      </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>