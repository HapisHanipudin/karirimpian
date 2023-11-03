<?php
include "../src/php/config.php";
error_reporting(0);
session_start();
if (!isset($_SESSION["username"])) {}
    else {
    header('location: ../');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}


if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $conpassword = $_POST['conpassword'];
    $acctype = $_POST['acctype'];
    $profileImg = (($acctype == 'user') ? 'user.png' : 'company.jpg');

    function generateUserId(string $acctype): string {
      $prefix = '';
      switch ($acctype) {
        case 'user':
          $prefix = 'USR';
          break;
        case 'company':
          $prefix = 'CMP';
          break;
        default:
          $prefix = 'ACC';
          break;
      }
      return $prefix . uniqid();
    }

    $user_id = generateUserId($acctype); // Menghasilkan user_id unik


if ($password == $conpassword) {
    $hashed_pw = password_hash($password, PASSWORD_DEFAULT);
    $sql_check_email = "SELECT * FROM account WHERE email='$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);

    if ($result_check_email->num_rows == 0) {
        $sql_account = "INSERT INTO account (user_id, username, email, password, acctype, profile_img) VALUES ('$user_id', '$username', '$email', '$hashed_pw', '$acctype', '$profileImg')";

        if ($acctype == 'user') {
            $sql_user = "INSERT INTO users (user_id, username, email, password, acctype) VALUES ('$user_id', '$username', '$email', '$hashed_pw', '$acctype')";
        } elseif ($acctype == 'company') {
            $sql_company = "INSERT INTO company (user_id, companyname, email, password, acctype) VALUES ('$user_id', '$username', '$email', '$hashed_pw', '$acctype')";
        }

        $result_account = mysqli_query($conn, $sql_account);
        $result_user = isset($sql_user) ? mysqli_query($conn, $sql_user) : null;
        $result_company = isset($sql_company) ? mysqli_query($conn, $sql_company) : null;

        if ($result_account && (!$sql_user || $result_user) && (!$sql_company || $result_company)) {
            header("location: ../"); // Redirect to a success page
            exit;
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    } else {
        echo "<script>alert('Email Already Used');</script>";
    }
} else {
    echo "<script>alert('Password Not Matched');</script>";
}

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KarirImpian</title>
    <link href="../dist/output.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="flex py-3 bg-slate-600 bg-opacity-75 px-5 justify-between items-center text-slate-50">
      <div class="logo">Logo</div>
      <div class="middlle-nav gap-1">
        <a href="gtau">gtau</a>
        <a href="gtau">gtau</a>
        <a href="gtau">gtau</a>
      </div>
      <div class="menu flex items-center gap-2">
        <!-- <span class="capitalize">Account</span> -->
        <button class="drop-btn group relative py-1 px-3 rounded-full border border-slate-50 text-slate-50">
          Option

          <div class="drop-menu">
            <a href="au" class="drop-link">Account Setting</a>
            <a href="au" class="text-red-600 drop-link">Log Out</a>
          </div>
        </button>
      </div>
    </nav>
    <section class="flex h-screen w-screen justify-center items-center">
<div class="card">
      <div class="card-body">
        <h1 class="card-title text-center">Login</h1>
        <form action="" method="post">
          <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="username" />
          </div>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email" />
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="password" />
          </div>
          <div class="form-control">
            <label for="conpassword">Confirm Password</label>
            <input type="password" name="conpassword" id="conpassword" placeholder="confirm password" />
          </div>
          <div class="form-control">
            <label for="acctype">Account Type</label>
            <select name="acctype" id="acctype" class="form-select" required>
              <option value="" disabled selected>Account Type</option>
              <option value="user">user</option>
              <option value="company">company</option>
            </select>
          </div>
          <button name="submit">Register</button>
        </form>
      </div>
    </div>
    </section>
    <script src="../src/js/script.js"></script>
  </body>
</html>
