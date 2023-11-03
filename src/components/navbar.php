<?php if(!empty($error)) { ?>
    <div class="bg-slate-50 flex fixed right-3 top-3 p-7 rounded-md -translate-y-[125%] animate-notif">
      <h3 class="text-xl"><?php echo $error; ?></h3>
    </div>
<?php $_SESSION['notif'] = ''; }
else {
  $_SESSION['notif'] = '';
}
?>



<nav class="fixed w-full top-0 z-[999] flex py-3 bg-gray-800 px-5 justify-between items-center text-slate-50">
            <div class="logo">
                <a href="../" class="font-extrabold ml-2 text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">
                    Karir Impian
                </a>
            </div>
                <ul class="flex space-x-8">
                    <a href="../" class="inline-block ">
                    <li class="text-center">
                            <div class="flex justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24"
                                        fill="currentColor" class="<?php if($activeTabs == 'home') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false">
                                        <path d="M23 9v2h-2v7a3 3 0 01-3 3h-4v-6h-4v6H6a3 3 0 01-3-3v-7H1V9l11-7 5 3.18V2h3v5.09z"></path>
                                    </svg>
                            </div>
                            <span class="<?php if($activeTabs == 'home') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Halaman Utama">
                                Halaman Utama
                            </span>  
                    </li>
                    </a>
                        <!---->

                    <a href="../pekerjaan/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="<?php if($activeTabs == 'pekerjaan') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false">
                                    <path
                                        d="M17 6V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2v4a3 3 0 003 3h14a3 3 0 003-3V6zM9 5a1 1 0 011-1h4a1 1 0 011 1v1H9zm10 9a4 4 0 003-1.38V17a3 3 0 01-3 3H5a3 3 0 01-3-3v-4.38A4 4 0 005 14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="<?php if($activeTabs == 'pekerjaan') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Pekerjaan">
                                Pekerjaan 
                            </span>
                        </li>
                    </a>

                    <!---->
                    <!-- <a href="../notifikasi/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="<?php if($activeTabs == 'notifikasi') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false">
                                    <path
                                        d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="<?php if($activeTabs == 'notifikasi') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Notifikasi">
                                Notifikasi
                            </span>
                        </li>
                    </a> -->
                    <!---->

                    <!---->
                    <a href="../profile/" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="<?php if($activeTabs == 'profile') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=fill"> <g id="profile"> <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z" fill="currentColor"></path> <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z" fill="currentColor"></path> </g> </g> </g></svg>
                            </div>
                            <span class="<?php if($activeTabs == 'profile') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Profile">
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
                    <a href="../pekerjaan/add.php" class="inline-block">
                        <li class="text-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor"
                                    class="<?php if($activeTabs == 'addpekerjaan') { echo 'text-sky-600'; } else { echo 'text-gray-50'; } ?>" width="24" height="24" focusable="false">
                                    <path
                                        d="M17 6V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2v4a3 3 0 003 3h14a3 3 0 003-3V6zM9 5a1 1 0 011-1h4a1 1 0 011 1v1H9zm10 9a4 4 0 003-1.38V17a3 3 0 01-3 3H5a3 3 0 01-3-3v-4.38A4 4 0 005 14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="<?php if($activeTabs == 'addpekerjaan') { echo 'underline underline-offset-8 text-sky-600'; } else { echo 'text-gray-50'; } ?>" title="Tambah Pekerjaan">
                                Tambah Pekerjaan
                            </span>
                        </li>
                    <!---->
                    </a>
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
                        <div class="drop-menu group-[.show]:max-h-screen max-h-0 overflow-hidden w-72 grid cursor-default
top-[120%] right-0 z-50 rounded-md absolute bg-slate-50 text-slate-950 group-[.show]:py-2 duration-200 ease-in-out">
                            <div class="w-full py-2 px-4">
                                <div class="flex mb-2">
                                    <img src="../src/uploads/profile/<?php echo $profile['profile_img'] ?>" alt="" class="rounded-full object-cover w-14 h-14">
                                    <div class="ml-2 p-1 text-left">
                                    <h1 class="font-semibold text-base"><?php echo $account['username'] ?></h1>
                                    <p class="text-sm"><?php echo ($accounttype === 'user') ? $profile['bio'] : $profile['description'] ?></p>
                                    </div>
                                </div>
                                <a href="../profile/" class="border-2 inline-block border-gray-600 text-gray-600 font-medium bg-transparent hover:bg-gray-800 hover:text-gray-200 rounded-full w-full">
                                        Lihat Profil
                                </a>
                            </div>
                            <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                                <a href="../profile/settings.php" class="ml-2 text-gray-700 hover:text-black hover:underline">Settings</a> <br>
                                <a href="../logout.php" class="ml-2 text-red-700 hover:text-red-600 hover:underline">Log Out</a>
                        </div>
                </button>
                <?php } else { ?>
                <button class="login-mdl-btn relative base py-1 px-3 rounded-full border border-slate-50 text-slate-50">
                    Get Started
                </button>
                <?php } ?>
            </div>
        </nav>

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
            // session_start();
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
            echo "<script>alert('Success registered');</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    } else {
            echo "<script>alert('Email already used');</script>";
    }
} else {
            echo "<script>alert('Password not matched');</script>";
}

}
?>
    <section id="loginModal" class="top-0 hidden z-[99999] fixed min-h-screen w-screen bg-black bg-opacity-70  items-center justify-center">

      <!-- login container -->
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
        <div class="md:block absolute right-[27.5%] z-[9999999]  group-[login]:translate-x-1/2 group-[register]:-translate-x-[37.5%] hidden w-1/2 ease-in-out duration-1000">
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
    <?php } ?>

