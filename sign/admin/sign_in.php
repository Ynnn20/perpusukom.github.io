<?php
session_start();

if(isset($_SESSION["signIn"]) ) {
  header("Location: ../../DashboardAdmin/dashboardAdmin.php");
  exit;
}

require "../../loginSystem/connect.php";

if(isset($_POST["signIn"]) ) {
  
  $nama = strtolower($_POST["nama_admin"]);
  $password = $_POST["password"];
  
  $result = mysqli_query($connect, "SELECT * FROM admin WHERE nama_admin = '$nama' AND password = '$password' ");
  
  if(mysqli_num_rows($result) === 1) {
    //SET SESSION 
    $_SESSION["signIn"] = true;
    $_SESSION["admin"]["nama_admin"] = $nama;
    header("Location: ../../DashboardAdmin/dashboardAdmin.php");
    exit;
  }
  $error = true;
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In || Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(to right, #198754, #198754);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      width: 400px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }
    .card img {
      width: 85px;
      display: block;
      margin: 0 auto;
    }
    .card h1 {
      text-align: center;
      font-weight: bold;
      color: #333;
    }
    .card form .input-group {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="card">
    <img src="../../assets/adminLogo.png" alt="adminLogo">
    <h1>Sign In - Admin</h1>
    <hr>
    <form action="" method="post">
      <div class="input-group" style="margin-top: 20px;">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" name="nama_admin" placeholder="Nama Lengkap" required>
      </div>
      <div class="input-group" style="margin-top: 20px;"> <!-- Tambahkan margin-top di sini -->
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <div style="margin-top: 30px;"> <!-- Tambahkan margin-top di sini -->
        <a href="../../index.php" class="btn btn-danger">Batal</a>
        <button class="btn btn-primary" type="submit" name="signIn">Sign In</button>
      </div>
    </form>
    <?php if(isset($error)) : ?>
      <div class="alert alert-danger mt-3" role="alert">Nama atau Password Salah!</div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
