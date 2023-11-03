<?php
include '../src/php/config.php';
include '../src/php/auth.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/');
    exit;
}

$userId = $_SESSION['user_id'];

// Periksa apakah pengguna memiliki akun tipe "user"
$getUserTypeQuery = "SELECT acctype FROM account WHERE user_id = '$userId'";
$userTypeResult = mysqli_query($conn, $getUserTypeQuery);
if ($userTypeResult && mysqli_num_rows($userTypeResult) > 0) {
    $userTypeRow = mysqli_fetch_assoc($userTypeResult);
    $acctype = $userTypeRow['acctype'];
} else {
    // Redirect pengguna jika terjadi kesalahan
    header('Location: ../login/');
    exit;
}

// Periksa apakah id pekerjaan yang diajukan sudah ada di URL
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];
    
    // Check Lamaran
    $lamaranQuery = "SELECT * FROM lamaran WHERE job_id = '$jobId' AND user_id = '$userId'";
    $lamaranResult = mysqli_query($conn, $lamaranQuery);
    if ($lamaranResult && mysqli_num_rows($lamaranResult) > 0) {
        header("location: ../pekerjaan/");
    } else {

    // Di sini Anda dapat mengambil data pekerjaan yang sesuai dari database, misalnya:
    $getJobQuery = "SELECT * FROM loker WHERE id = '$jobId'";
    $jobResult = mysqli_query($conn, $getJobQuery);


    if ($jobResult && mysqli_num_rows($jobResult) > 0) {
        $jobRow = mysqli_fetch_assoc($jobResult);
            $id = uniqid();
            $lokerId = $jobRow['id'];
            $lokerCompany = $jobRow['company'];

            $sql = "INSERT into lamaran (lamaran_id, job_id, user_id, status, company) VALUES ('$id', '$lokerId', '$userId', 'pending', '$lokerCompany')";
            $result = mysqli_query($conn, $sql);

            $notifSql = "INSERT into notif (notif_id, company, user, job_id, status, type, tujuan) VALUES ('$id', '$lokerCompany', '$userId', '$lokerId', 'unread', 'pending', '$lokerCompany')";
            $notifResult = mysqli_query($conn, $notifSql);
            
        // Anda dapat menampilkan data pekerjaan dan formulir lamaran di sini
    } else {
        // Redirect pengguna jika pekerjaan tidak ditemukan
        header('Location: index.php'); // Gantilah dengan URL yang sesuai
        exit;
    } }
} else {
    // Redirect pengguna jika id pekerjaan tidak valid
    header('Location: index.php'); // Gantilah dengan URL yang sesuai
    exit;
}

// Proses pengajuan lamaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Tangani proses pengajuan lamaran di sini
    // Pastikan untuk memvalidasi data yang dikirim oleh pengguna
    // Simpan data lamaran ke database jika valid
}

// Halaman HTML untuk ajukan lamaran
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Lamaran</title>
    <!-- Tambahkan tautan ke file CSS Anda di sini -->
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="../dist/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- TAOS -->
    <script>document.documentElement.classList.add('js')</script>
    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php include '../src/components/navbar.php'; ?>
    <!-- Tambahkan tampilan formulir untuk mengajukan lamaran di sini -->
    <section class="flex flex-col h-screen items-center justify-center align"> 

        <h1 class="text-xl font-bold">Pengajuan Anda Sukses!</h1>
        <a href="../pekerjaan/" class="mt-4 bg-gray-800 py-2 px-4 rounded-md text-white">Kembali</a>

    </section>
</body>
</html>
