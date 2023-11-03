<?php
include 'src/php/config.php';
include 'src/php/auth.php';
$activeTabs = 'home';
?>

<!doctype html>
<html class="bg-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- TAOS -->
    <script>document.documentElement.classList.add('js')</script>
    <!-- flowbite -->
    <link href="dist/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.3.3"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body <?= $userEcho ?>>

    <!-- =========== NAVBAR =========== -->
        <nav class="fixed top-0 w-full z-[9999] flex py-3 bg-gray-800 px-5 justify-between items-center text-slate-50">
            <div class="logo">
                <a href="#" class=" ml-2 font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">
                    Karir Impian
                </a>
            </div>
                <ul class="flex space-x-8">
                    <a href="#" class="inline-block">
                    <li class="text-center">
                            <div class="flex justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24"
                                        fill="currentColor" class="text-sky-600" width="24" height="24" focusable="false">
                                        <path d="M23 9v2h-2v7a3 3 0 01-3 3h-4v-6h-4v6H6a3 3 0 01-3-3v-7H1V9l11-7 5 3.18V2h3v5.09z"></path>
                                    </svg>
                            </div>
                            <span class="underline underline-offset-8 text-sky-600" title="Halaman Utama">
                                Halaman Utama
                            </span>  
                    </li>
                    </a>
                        <!---->

                    <a href="pekerjaan/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="text-gray-50" width="24" height="24" focusable="false">
                                    <path
                                        d="M17 6V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2v4a3 3 0 003 3h14a3 3 0 003-3V6zM9 5a1 1 0 011-1h4a1 1 0 011 1v1H9zm10 9a4 4 0 003-1.38V17a3 3 0 01-3 3H5a3 3 0 01-3-3v-4.38A4 4 0 005 14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-gray-50" title="Notifikasi">
                                Pekerjaan 
                            </span>
                        </li>
                    </a>

                    <!---->
                    <!-- <a href="notifikasi/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="text-gray-50" width="24" height="24" focusable="false">
                                    <path
                                        d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-gray-50" title="Notifikasi">
                                Notifikasi
                            </span>
                        </li>
                    </a> -->
                    <!---->

                    <!---->
                    <a href="profile/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="text-gray-50" width="24" height="24" focusable="false"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=fill"> <g id="profile"> <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z" fill="currentColor"></path> <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z" fill="currentColor"></path> </g> </g> </g></svg>
                            </div>
                            <span class="text-gray-50" title="Notifikasi">
                                Profil
                            </span>
                        </li>
                    </a>
                    <!---->

                    <!---->
                    <?php if ($acctype === 'company') { ?>
                    <!---->
                    <a href="../lamaran/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                              <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="<?php if($activeTabs == 'lamaran') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=fill"> <g id="document"> <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M8 1.25C4.82436 1.25 2.25 3.82436 2.25 7V17C2.25 20.1756 4.82436 22.75 8 22.75H16C19.1756 22.75 21.75 20.1756 21.75 17V7C21.75 3.82436 19.1756 1.25 16 1.25H8ZM8 7.44995C7.58579 7.44995 7.25 7.78574 7.25 8.19995C7.25 8.61416 7.58579 8.94995 8 8.94995H16C16.4142 8.94995 16.75 8.61416 16.75 8.19995C16.75 7.78574 16.4142 7.44995 16 7.44995H8ZM7.25 12.2C7.25 11.7857 7.58579 11.45 8 11.45H16C16.4142 11.45 16.75 11.7857 16.75 12.2C16.75 12.6142 16.4142 12.95 16 12.95H8C7.58579 12.95 7.25 12.6142 7.25 12.2ZM9 15.45C8.58579 15.45 8.25 15.7857 8.25 16.2C8.25 16.6142 8.58579 16.95 9 16.95H15C15.4142 16.95 15.75 16.6142 15.75 16.2C15.75 15.7857 15.4142 15.45 15 15.45H9Z" fill="currentColor"></path> </g> </g> </g></svg>
                            </div>
                            <span class="<?php if($activeTabs == 'lamaran') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Lamaran">
                                Lamaran
                            </span>
                        </li>
                    </a>
                    <!---->

                    <!---->
                    <a href="pekerjaan/add.php" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="text-gray-50" width="24" height="24" focusable="false">
                                    <path
                                        d="M17 6V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2v4a3 3 0 003 3h14a3 3 0 003-3V6zM9 5a1 1 0 011-1h4a1 1 0 011 1v1H9zm10 9a4 4 0 003-1.38V17a3 3 0 01-3 3H5a3 3 0 01-3-3v-4.38A4 4 0 005 14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-gray-50" title="Notifikasi">
                                Tambah Pekerjaan
                            </span>
                        </li>
                    </a>
                    <!--  -->
                    <?php } ?>
                    <!---->
                
                </ul>
            <div class="menu flex items-center gap-2">
                <!-- <span class="capitalize">Account</span> -->
                <?php if(isset($_SESSION["username"])) { 
                    $sql_account = "SELECT * FROM account WHERE user_id = '$userId'";
                    $result_account = mysqli_query($conn, $sql_account);
                    $account = mysqli_fetch_assoc($result_account);
                    $accounttype = $account['acctype'];
                    if ($accounttype == 'user') {
                    $profileSql = "SELECT * FROM users WHERE user_id = '$userId'";
                        } else {
                    $profileSql = "SELECT * FROM company WHERE user_id = '$userId'";
                    }
                    $profileResult = mysqli_query($conn, $profileSql);
                    $profile = mysqli_fetch_assoc($profileResult);
                    ?>
                <button class="drop-btn group relative base py-1 px-3 rounded-full border border-slate-50 text-slate-50 capitalize">
                    <?php echo $account['username'] ?>
                    <!-- <div
                        class="drop-menu group-[.show]:max-h-screen max-h-0 overflow-hidden w-max grid top-[120%] right-0 z-50 rounded-md absolute bg-slate-50 text-slate-950 group-[.show]:py-2 duration-200 ease-in-out">
                        <a href="account/" class="px-6 hover:bg-slate-200 ease-in-out duration-75">Account Setting</a>
                        <a href="../logout.php" class="text-red-600 px-6 hover:bg-slate-200 ease-in-out duration-75">Log Out</a>
                    </div> -->
                        <div class="drop-menu group-[.show]:max-h-screen max-h-0 overflow-hidden w-72 grid
top-[120%] right-0 z-50 rounded-md absolute bg-slate-50 text-slate-950 group-[.show]:py-2 duration-200 ease-in-out">
                            <div class="w-full py-2 px-4">
                                <div class="flex mb-2 text-left">
                                    <img src="src/uploads/profile/<?php echo $profile['profile_img'] ?>" alt="" class="rounded-full object-cover w-14 h-14">
                                    <div class="ml-2 p-1">
                                    <h1 class="font-semibold text-base"><?php echo $account['username'] ?></h1>
                                    <p class="text-sm"><?php echo ($accounttype === 'user') ? $profile['bio'] : $profile['description'] ?></p>
                                    </div>
                                </div>
                                <a href="profile/" class="border-2 inline-block border-gray-600 text-gray-600 font-medium bg-transparent hover:bg-gray-800 hover:text-gray-200 rounded-full w-4/5">
                                        Lihat Profil
                                </a>
                            </div>
                            <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                                <a href="profile/settings.php" class="ml-2 text-gray-700 hover:text-black hover:underline">Settings</a> <br>
                                <a href="logout.php" class="ml-2 text-red-700 hover:text-red-600 hover:underline">Log Out</a>
                        </div>
                </button>
                <?php } else { ?>
                <button class="login-mdl-btn relative base py-1 px-3 rounded-full border border-slate-50 text-slate-50">
                    Get Started
                </button>
                <?php } ?>
            </div>
        </nav>
        <!-- =========== NAVBAR =========== -->

        <!-- Login -->
<?php if (!isset($_SESSION["username"])) { ?>
    <?php 
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
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["acctype"] = $row["acctype"];
            $_SESSION["username"] = $row["username"];

            $_SESSION['notif'] = "Login Berhasil";
            // Redirect ke halaman yang sesuai setelah login berhasil
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
    $acctype = $_POST['regacctype'];
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
        $sql_account = "INSERT INTO account (user_id, username, email, password, acctype) VALUES ('$user_id', '$username', '$email', '$hashed_pw', '$acctype')";

        if ($acctype == 'user') {
            $sql_user = "INSERT INTO users (user_id, username, email) VALUES ('$user_id', '$username', '$email')";
        } elseif ($acctype == 'company') {
            $sql_company = "INSERT INTO company (user_id, companyname, email) VALUES ('$user_id', '$username', '$email')";
        }

        $result_account = mysqli_query($conn, $sql_account);
        $result_user = isset($sql_user) ? mysqli_query($conn, $sql_user) : null;
        $result_company = isset($sql_company) ? mysqli_query($conn, $sql_company) : null;

        if ($result_account && (!$sql_user || $result_user) && (!$sql_company || $result_company)) {
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
    <section id="loginModal" class="top-0 hidden z-[99999] fixed min-h-screen w-screen bg-black bg-opacity-70  items-center justify-center">
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
          <img class="rounded-2xl" src="src/img/kerja.jpg" />
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
    <?php } ?>
        <!-- Login -->

        <!-- =========== JUMBOTRON =========== -->
        <div class="lg:h-[80vh] relative mt-8 sm:mt-4 lg:mt-0 flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0 items-center">
            <div class="inset-y-0 lg:right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-8/12 lg:max-w-full lg:absolute xl:px-0">
                <svg class="absolute  left-0 hidden lg:h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100"
                    fill="currentColor" preserveAspectRatio="none slice">
                    <path d="M50 0H100L50 100H0L50 0Z"></path>
                </svg>
                <img class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
                    src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                    alt="" />
            </div>
            <div class="relative lg:h-full flex flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
                <div class="mb-16 lg:my-auto lg:max-w-lg lg:pr-5">
                    <p
                        class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                        Karir Impian
                    </p>
                    <h2 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                        Sambut Masa Depan,<br class="hidden md:block" />
                        Temukan Karir
                        <span class="inline-block text-deep-purple-accent-400">Impian</span>
                    </h2>
                    <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg">
                        Di Karir Impian anda dapat menemukan berbagai macam pekerjaan yang anda butuhkan
                    </p>
                    <div class="flex items-center">
                        <?php if (!isset($_SESSION['user_id'])) { ?>
                            <button
                            class="login-mdl-btn inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-black transition duration-200 rounded shadow-md bg-blueGray-400 hover:bg-blueGray-800 focus:shadow-outline focus:outline-none">
                            Login
                            </button>
                        <?php } ?>
                        <a href="pekerjaan/" class="inline-flex items-center font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700">Cari Pekerjaan</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========== JUMBOTRON =========== -->

        <!-- =========== TENGAH TENGAH =========== -->
        <div id="fullWidthTabContent" class="flex text-center items-center h-auto justify-center -translate-y-12 w-auto">
            <div class="bg-white rounded-lg w-max dark:bg-gray-800 h-max justify-center text-center items-center shadow-xl  hover:shadow-2xl" id="stats" role="tabpanel"
                aria-labelledby="stats-tab">
                <dl
                    class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">100jt+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Lowongan Kerja</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">73jt+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Pelamar</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">67jt+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Pengangguran->Bekerja</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">4jt+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Perusahaan</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">1M+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Akun Terdaftar</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">90+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Investor</dd>
                    </div>
                </dl>
            </div>
        </div>
        <!-- =========== TENGAH TENGAH =========== -->

        <!-- =========== TENTANG KAMI =========== -->
        <section class="flex items-center bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800 ">
            <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
                <div class="flex flex-wrap ">
                    <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                        <div class="relative lg:max-w-md">
                            <img src="src/img/IMG_8545.png" alt="aboutimage"
                                class="relative z-10 object-cover w-full rounded h-96">
                            <div
                                class="absolute bottom-0 right-0 z-10 p-8 bg-white border-4 border-blue-500 rounded shadow dark:border-blue-400 lg:-mb-8 lg:-mr-11 sm:p-8 dark:text-gray-300 dark:bg-gray-800 ">
                                <p class="text-lg font-semibold md:w-72">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="absolute top-0 left-0 w-16 h-16 text-blue-700 dark:text-gray-300 opacity-10"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z">
                                        </path>
                                    </svg>Ketika saya menemukan Karir Impian, Akhirnya saya bekerja setelah 5 tahun menjadi pengangguran - Gery Azrian
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-6 mb-10 lg:w-1/2 lg:mb-0 ">
                        <div class="pl-4 mb-6 border-l-4 border-blue-500 ">
                            <span class="text-sm text-gray-600 uppercase dark:text-gray-400">Apa itu Karir Impian?</span>
                            <h1 class="mt-2 text-3xl font-black text-gray-700 md:text-5xl dark:text-gray-300">
                                Tentang Kami
                            </h1>
                        </div>
                        <p class="mb-6 text-base leading-7 text-gray-500 dark:text-gray-400">
                            Karir Impian adalah sebuah Perusahaan yang menyediakan banyak lowongan kerja untuk semua orang.
                            Mulai dari pekerjaan yang biasa hingga pekerjaan yang luar biasa.
                            Karir Impian disediakan untuk orang pengangguran yang menginginkan pekerjaan tapi
                            tidak tahu ingin mencari pekerjaan dimana. Maka dari itu Karir Impian sangat cocok untuk para pengangguran.
                        </p>
                        <a href="#"
                            class="px-4 py-2 text-gray-100 bg-blue-500 rounded dark:bg-blue-400 dark:hover:bg-blue-500 hover:bg-blue-600">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== TENTANG KAMI ========== -->

        <!-- =========== KEUNGGULAN =========== -->
        <div class="bg-gray-700 p-4 min-h-screen relative">
            <div aria-hidden="true" class="absolute inset-0 h-max w-full m-auto grid grid-cols-2 -space-x-52 opacity-20">
                <div class="blur-[106px] h-56 bg-gradient-to-br  to-purple-400 from-blue-700"></div>
                <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400  to-indigo-600"></div>
            </div>
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
                <div class="md:w-2/3 lg:w-1/2 mt-12 text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 text-secondary">
                        <path fill-rule="evenodd"
                            d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h2 class="my-8 text-2xl font-bold text-white md:text-4xl">Keunggulan Karir Impian</h2>
                    <p class="text-gray-300">Kami mempunyai keunggulan yang membuat kami beda dari yang lain</p>
                </div>
                <div class="mt-16 grid gap-8 divide-x divide-y  divide-gray-700 overflow-hidden  rounded-3xl border text-gray-600 border-gray-700 sm:grid-cols-2 lg:grid-cols-4  lg:divide-y-0 xl:grid-cols-4">
                    <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl  hover:shadow-gray-600/10">
                        <div class="relative space-y-8 py-12 p-8">
                            <svg fill="#ffffff" width="162px" height="162px" viewBox="0 0 24 24" id="job" data-name="Flat Color"
                                xmlns="http://www.w3.org/2000/svg" class="icon flat-color w-14 h-14 rounded-full">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path id="secondary" d="M16,8H8A1,1,0,0,1,7,7V4A2,2,0,0,1,9,2h6a2,2,0,0,1,2,2V7A1,1,0,0,1,16,8ZM9,6h6V4H9Z"
                                        style="fill: #2ca9bc;"></path>
                                    <rect id="primary" x="2" y="6" width="20" height="16" rx="2" style="fill: #ffffff;"></rect>
                                    <path id="secondary-2" data-name="secondary"
                                        d="M15,14a1,1,0,0,1-1-1V12H7a1,1,0,0,1,0-2H17a1,1,0,0,1,0,2H16v1A1,1,0,0,1,15,14Z" style="fill: #2ca9bc;">
                                    </path>
                                </g>
                            </svg>
                            <div class="space-y-2">
                                <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Impian Pekerjaan</h5>
                                <p class="text-gray-300">Temukan pekerjaan yang sesuai dengan impian karier Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
                        <div class="relative space-y-8 py-12 p-8">
                            <svg fill="#ffffff" width="162px" class="w-14 h-14" height="162px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M37,9H35V7h2ZM33,9H31V7h2ZM29,9H27V7h2Z"></path>
                                    <path d="M15,41H13V39h2Zm0-4H13V35h2Zm0-4H13V31h2Zm0-4H13V27h2Zm0-4H13V23h2Z"></path>
                                    <path d="M37,51H35V49h2Zm-4,0H31V49h2Zm-4,0H27V49h2Z"></path>
                                    <path d="M50,41H48V39h2Zm0-4H48V35h2Zm0-4H48V31h2Zm0-4H48V27h2Zm0-4H48V23h2Z"></path>
                                    <path d="M42,48a1,1,0,0,1,1-1H55a1,1,0,0,1,1,1v8h1V46H41V56h1Z"></path>
                                    <path d="M42,6a1,1,0,0,1,1-1H55a1,1,0,0,1,1,1v8h1V4H41V14h1Z"></path>
                                    <path d="M41,60H57a3.006,3.006,0,0,0,2.829-2H38.171A3.006,3.006,0,0,0,41,60Z"></path>
                                    <path d="M7,60H23a3.006,3.006,0,0,0,2.829-2H4.171A3.006,3.006,0,0,0,7,60Z"></path>
                                    <rect height="7" width="10" x="44" y="49"></rect>
                                    <rect height="7" width="10" x="10" y="49"></rect>
                                    <rect height="7" width="10" x="44" y="7"></rect>
                                    <path d="M41,18H57a3.006,3.006,0,0,0,2.829-2H38.171A3.006,3.006,0,0,0,41,18Z"></path>
                                    <path d="M8,48a1,1,0,0,1,1-1H21a1,1,0,0,1,1,1v8h1V46H7V56H8Z"></path>
                                    <path
                                        d="M25.514,26.656c-1.4-.153-2.72-.357-3.92-.607A11.879,11.879,0,0,0,20.051,31h4.973A26.75,26.75,0,0,1,25.514,26.656Z">
                                    </path>
                                    <path
                                        d="M25.024,33H20.051a11.879,11.879,0,0,0,1.543,4.951c1.2-.25,2.518-.454,3.92-.607A26.75,26.75,0,0,1,25.024,33Z">
                                    </path>
                                    <path
                                        d="M22.848,39.743a12.03,12.03,0,0,0,4.928,3.475,14.668,14.668,0,0,1-1.77-3.918C24.892,39.416,23.834,39.565,22.848,39.743Z">
                                    </path>
                                    <path d="M7,18H23a3.006,3.006,0,0,0,2.829-2H4.171A3.006,3.006,0,0,0,7,18Z"></path>
                                    <path
                                        d="M27.515,37.159C28.962,37.054,30.469,37,32,37s3.038.054,4.485.159A24.591,24.591,0,0,0,36.977,33H27.023A24.591,24.591,0,0,0,27.515,37.159Z">
                                    </path>
                                    <path d="M8,6A1,1,0,0,1,9,5H21a1,1,0,0,1,1,1v8h1V4H7V14H8Z"></path>
                                    <rect height="7" width="10" x="10" y="7"></rect>
                                    <path
                                        d="M41.152,24.257a12.03,12.03,0,0,0-4.928-3.475,14.668,14.668,0,0,1,1.77,3.918C39.108,24.584,40.166,24.435,41.152,24.257Z">
                                    </path>
                                    <path
                                        d="M27.776,20.782a12.03,12.03,0,0,0-4.928,3.475c.986.178,2.044.327,3.158.443A14.668,14.668,0,0,1,27.776,20.782Z">
                                    </path>
                                    <path
                                        d="M36.485,26.841C35.038,26.946,33.531,27,32,27s-3.038-.054-4.485-.159A24.591,24.591,0,0,0,27.023,31h9.954A24.591,24.591,0,0,0,36.485,26.841Z">
                                    </path>
                                    <path
                                        d="M35.965,24.87C34.98,21.838,33.442,20,32,20s-2.98,1.838-3.965,4.87c1.283.083,2.611.13,3.965.13S34.682,24.953,35.965,24.87Z">
                                    </path>
                                    <path
                                        d="M38.976,31h4.973a11.879,11.879,0,0,0-1.543-4.951c-1.2.25-2.518.454-3.92.607A26.75,26.75,0,0,1,38.976,31Z">
                                    </path>
                                    <path
                                        d="M28.035,39.13C29.02,42.162,30.558,44,32,44s2.98-1.838,3.965-4.87C34.682,39.047,33.354,39,32,39S29.318,39.047,28.035,39.13Z">
                                    </path>
                                    <path
                                        d="M38.486,37.344c1.4.153,2.72.357,3.92.607A11.879,11.879,0,0,0,43.949,33H38.976A26.75,26.75,0,0,1,38.486,37.344Z">
                                    </path>
                                    <path
                                        d="M36.224,43.218a12.03,12.03,0,0,0,4.928-3.475c-.986-.178-2.044-.327-3.158-.443A14.668,14.668,0,0,1,36.224,43.218Z">
                                    </path>
                                </g>
                            </svg>
                            <div class="space-y-2">
                                <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Akses Mudah</h5>
                                <p class="text-gray-300">Cari pekerjaan di mana saja, kapan saja.</p>
                            </div>
                        </div>
                    </div>
                    <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
                        <div class="relative space-y-8 py-12 p-8">
                            <svg fill="#ffffff" width="162px" height="162px" viewBox="-2.4 -2.4 28.80 28.80" id="quality-4" data-name="Line Color"
                                xmlns="http://www.w3.org/2000/svg" class="icon line-color w-14 h-14 rounded-full" transform="matrix(1, 0, 0, 1, 0, 0)">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#f00000" stroke-width="0.144">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <polygon id="secondary"
                                        points="12 8.25 11.38 9.4 10 9.59 11 10.48 10.76 11.75 12 11.15 13.24 11.75 13 10.48 14 9.59 12.62 9.4 12 8.25"
                                        style="fill: none; stroke: #2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </polygon>
                                    <polyline id="primary" points="5.79 13.57 3 17.56 6.03 18.46 7.91 21 10.79 16.89"
                                        style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </polyline>
                                    <polyline id="primary-2" data-name="primary" points="18.21 13.57 21 17.56 17.97 18.46 16.09 21 13.21 16.89"
                                        style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </polyline>
                                    <circle id="primary-3" data-name="primary" cx="12" cy="10" r="7"
                                        style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </circle>
                                </g>
                            </svg>
                            <div class="space-y-2">
                                <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Pekerjaan Berkualitas</h5>
                                <p class="text-gray-300">Pekerjaan berkualitas, bebas dari pekerjaan yang tidak sesuai.</p>
                            </div>
                        </div>
                    </div>
                    <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
                        <div class="relative space-y-8 py-12 p-8">
                            <svg fill="#ffffff" width="162px" height="162px" class="w-14 h-14 " viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M406.083 788.495c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v119.47h102.4v-119.47zm-143.36 160.43v-160.43c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v160.43h-184.32z">
                                    </path>
                                    <path
                                        d="M549.443 706.575c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v201.39h102.4v-201.39zm-143.36 242.35v-242.35c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v242.35h-184.32z">
                                    </path>
                                    <path
                                        d="M692.803 624.655c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v283.31h102.4v-283.31zm-143.36 324.27v-324.27c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v324.27h-184.32zm-92.985-663.189l-80.404-158.218c-3.461-6.812 1.489-14.878 9.134-14.878h251.628c7.645 0 12.59 8.061 9.127 14.873l-80.397 158.224c-5.124 10.084-1.103 22.412 8.981 27.536s22.412 1.103 27.536-8.981l80.394-158.218c17.319-34.058-7.427-74.394-45.64-74.394H385.189c-38.208 0-62.956 40.328-45.651 74.392l80.406 158.221c5.124 10.083 17.453 14.104 27.536 8.979s14.104-17.453 8.979-27.536z">
                                    </path>
                                    <path
                                        d="M725.04 909.844c101.8 0 184.32-82.52 184.32-184.32v-43.151c0-197.073-161.327-358.4-358.4-358.4h-79.923c-197.073 0-358.4 161.327-358.4 358.4v43.151c0 101.797 82.526 184.32 184.32 184.32H725.04zm0 40.96H296.957c-124.415 0-225.28-100.862-225.28-225.28v-43.151c0-219.695 179.665-399.36 399.36-399.36h79.923c219.695 0 399.36 179.665 399.36 399.36v43.151c0 124.422-100.858 225.28-225.28 225.28z">
                                    </path>
                                </g>
                            </svg>
                            <div class="space-y-2">
                                <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Tinjauan Gaji</h5>
                                <p class="text-gray-300">Informasi tentang gaji rata-rata di berbagai pekerjaan dan perusahaan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========== KEUNGGULAN =========== -->

        <!-- =========== FOOTER =========== -->
        <footer class="relative bg-blueGray-800 pt-8 pb-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap text-left lg:text-left">
                    <div class="w-full lg:w-6/12 px-4">
                        <h4 class="text-3xl fonat-semibold text-white">Mari kita tetap berhubungan!</h4>
                        <h5 class="text-lg mt-0 mb-2 text-white">
                            Temukan kami di sosial media dibawah ini :
                        </h5>
                        <div class="mt-6 lg:mb-0 mb-6">
                            <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"> <i class="fab fa-twitter"></i></button>
                                <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"> <i class="fab fa-facebook-square"></i></button>
                                <button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"> <i class="fab fa-instagram"></i></button>
                                <button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">  <i class="fab fa-github"></i>
                            </button>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="flex flex-wrap items-top mb-6">
                            <div class="w-full lg:w-4/12 px-4 ml-auto">
                                <span class="block uppercase text-white text-sm font-semibold mb-2">Link</span>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://www.creative-tim.com/presentation?ref=njs-profile">Tentang Kami</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://blog.creative-tim.com?ref=njs-profile">Keunggulan</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Pekerjaan</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://www.github.com/creativetimofficial?ref=njs-profile">Login</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full lg:w-4/12 px-4">
                                <span class="block uppercase text-white text-sm font-semibold mb-2">Sponsor</span>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">Sekolah impian</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://creative-tim.com/terms?ref=njs-profile">Quadrant Boarding School</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://creative-tim.com/privacy?ref=njs-profile">Fahim Quran Plus</a>
                                    </li>
                                    <li>
                                        <a class="text-white hover:text-gray-400 font-semibold block pb-2 text-sm"
                                            href="https://creative-tim.com/contact-us?ref=njs-profile">Sekolah Tahfidz Fahim Quran</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-blueGray-300">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-white font-semibold py-1">
                            Copyright © <span id="get-current-year">2023</span><a
                                href="https://www.creative-tim.com/product/notus-js"
                                class="text-white hover:text-gray-400" target="_blank"> Karir Impian by
                                <a href="https://www.creative-tim.com?ref=njs-profile"
                                    class="text-white hover:text-gray-400">Faiz Alya Udin</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- =========== FOOTER =========== -->

    <script src="src/js/script.js"></script>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>