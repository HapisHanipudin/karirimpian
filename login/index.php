<?php
include "../src/php/config.php"; // Sertakan file konfigurasi database
error_reporting(E_ALL);
session_start();
if (isset($_SESSION["username"]))  {
    header('location: ../');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}

if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $acctype = $_POST['acctype'];

    $sql = "SELECT * FROM `account` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Periksa apakah kata sandi yang dimasukkan cocok dengan hash yang disimpan
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["acctype"] = $row["acctype"];
            $_SESSION["username"] = $row["username"];

            echo "<script>alert('Login berhasil');</script>";
            // Redirect ke halaman yang sesuai setelah login berhasil
            header("location: ../");
            exit();
        } else {
            $error = "Email atau kata sandi salah.";
        }
    } else {
        $error = "Email atau kata sandi salah.";
    }
}

if (isset($_POST["register"])) {
    $username = $_POST['regusername'];
    $email = $_POST['regemail'];
    $password = $_POST["regpassword"];
    $conpassword = $_POST['regconpassword'];
    $acctype = $_POST['reegacctype'];
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
    <link href="../dist/output.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins:wght@300;400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Login Page</title>
  </head>

  <body class="antialiased ">
    <section class="login-modal flex min-h-screen w-screen bg-black bg-opacity-70  items-center justify-center">

      <!-- login container -->
      <div class="bg-gray-100 w-[150%] relative grouplogin flex rounded-2xl shadow-lg max-w-3xl p-5 items-center justify-between container-form">
        <!-- Login -->
        <div class="login max-h-0 group-[login]:max-h-screen overflow-hidden md:w-1/2 px-8 md:px-16 ease-in-out duration-1000">
          <h2 class="font-bold text-2xl text-[#002D74]">Login</h2>
          <p class="text-xs mt-4 text-[#002D74]">If you are already a member, log in now!!</p>

          <form action="" method="POST" class="flex flex-col gap-4">
            <input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email" />
            <div class="relative">
              <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password" />
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
            <!-- <select name="acctype" id="acctype" class="form-select p-2 rounded-xl border" required>
              <option value="" disabled selected>Account Type</option>
              <option value="user">User</option>
              <option value="company">Company</option>
            </select> -->
            <button name="login" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
              <?php if (isset($error)) { echo '<div class="error-message">' . $error .'</div>'; } ?>
          </form>

          <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
            <hr class="border-gray-400" />
            <p class="text-center text-sm">OR</p>
            <hr class="border-gray-400" />
          </div>

          <button class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
            <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
              <path
                fill="#FFC107"
                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
              />
              <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
              <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
              <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
            </svg>
            Login with Google
          </button>

          <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
            <p>Don't have an account?</p>
            <button  class="text-blue-800 register-btn">Register</button>
          </div>
        </div> 

        <!-- image -->
        <div class="md:block absolute right-[27.5%]  group-[login]:translate-x-1/2 group-[register]:-translate-x-[37.5%] hidden w-1/2 ease-in-out duration-1000">
          <img class="rounded-2xl" src="../src/img/kerja.jpg" />
        </div>

        <!-- Register form -->
        <div class="register right-0 max-h-0 group-[register]:max-h-screen overflow-hidden  md:w-1/2 px-8 md:px-16 ease-in-out duration-1000">
          <h2 class="font-bold text-2xl text-[#002D74]">Register</h2>
          <p class="text-xs mt-4 text-[#002D74]">If you don't have account, Register now!!</p>

          <form action="" method="POST" class="flex flex-col gap-4">
            <input class="p-2 mt-8 rounded-xl border" type="text" name="regusername" placeholder="Username" />
            <input class="p-2 rounded-xl border" type="email" name="regemail" placeholder="Email" />
            <div class="relative">
              <input class="p-2 rounded-xl border w-full" type="password" name="regpassword" placeholder="Password" />
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
            <div class="relative">
              <input class="p-2 rounded-xl border w-full" type="password" name="regconpassword" placeholder="Confirm Password" />
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
            <select name="regacctype" id="acctype" class="form-select p-2 rounded-xl border" required>
              <option value="" disabled selected>Account Type</option>
              <option value="user">User</option>
              <option value="company">Company</option>
            </select>
            <button name="register" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Register</button>
              <?php if (isset($error)) { echo '<div class="error-message">' . $error .'</div>'; } ?>
          </form>

          <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
            <hr class="border-gray-400" />
            <p class="text-center text-sm">OR</p>
            <hr class="border-gray-400" />
          </div>

          <button class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
            <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
              <path
                fill="#FFC107"
                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
              />
              <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
              <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
              <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
            </svg>
            Sign Up with Google
          </button>

          <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
            <p>Have an account?</p>
            <button class="text-blue-800 login-btn">Log In</button>
          </div>
        </div>
      </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="../src/js/script.js"></script>
  </body>
</html>
