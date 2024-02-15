<?php 
session_start();

//Jika member sudah login, tidak boleh kembali ke halaman login ,kecuali logout
if(isset($_SESSION["signIn"]) ) {
  header("Location: ../../DashboardMember/dashboardMember.php");
  exit;
}

require "../../loginSystem/connect.php";

if(isset($_POST["signIn"]) ) {
  
  $nama = strtolower($_POST["nama"]);
  $nisn = $_POST["nisn"];
  $password = $_POST["password"];
  
  
  $result = mysqli_query($connect, "SELECT * FROM member WHERE nama = '$nama' AND nisn = $nisn");
  
  if(mysqli_num_rows($result) === 1) {
    //cek pw 
    $pw = mysqli_fetch_assoc($result);
    if(password_verify($password, $pw["password"]) ) {
      // SET SESSION 
      $_SESSION["signIn"] = true;
      $_SESSION["member"]["nama"] = $nama;
      $_SESSION["member"]["nisn"] = $nisn;
      header("Location: ../../DashboardMember/dashboardMember.php");
      exit;
    }
  }
  $error = true;
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Sign In || Siswa</title>
    <style>
        body {
            background: linear-gradient(to right, #198754, #198754);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
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
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container center-form">
    <div class="card p-2">
        <div class="position-absolute top-0 start-50 translate-middle">
            <img src="../../assets/memberLogo.png" alt="adminLogo" width="85px">
        </div>
        <h1 class="pt-5 text-center fw-bold">Sign In - Siswa</h1>
        <hr>
        <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
            <label for="validationCustom01" class="form-label">Nama Lengkap</label>
            <div class="input-group mt-0">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" name="nama" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Masukkan nama anda!
                </div>
            </div>
            <label for="validationCustom01" class="form-label">Nisn</label>
            <div class="input-group mt-0">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
                <input type="number" class="form-control" name="nisn" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Masukkan Nisn anda!
                </div>
            </div>
            <label for="validationCustom02" class="form-label">Password</label>
            <div class="input-group mt-0">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" id="validationCustom02" name="password" required>
                <div class="invalid-feedback">
                    Masukkan Password anda!
                </div>
            </div>
            <div>
                <a class="btn btn-danger" href="../../index.php">Batal</a>
                <button class="btn btn-primary" type="submit" name="signIn">Sign In</button>
            </div>
            <p class="mt-3 text-center">Don't have an account yet? <a href="sign_up.php" class="text-decoration-none text-primary">Sign Up</a></p>
        </form>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger mt-2" role="alert">Nama / Nisn / Password tidak sesuai !
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
