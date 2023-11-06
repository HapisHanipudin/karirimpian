<?php 
include '../src/php/config.php';
include '../src/php/auth.php';

$readSql = "UPDATE notif SET status = 'unread' WHERE tujuan = '$userId'";
$result = mysqli_query($conn, $readSql);

// if ($result) {
//     // Pengubahan status berhasil, arahkan pengguna ke halaman terakhir yang dikunjungi
//     if (isset($_SESSION['last_visited_page'])) {
//         header("Location: " . $_SESSION['last_visited_page']);
//     } else {
//         header("Location: ../index.php"); // Jika session kosong, arahkan ke halaman default
//     }
//     exit;
// } else {
//     // Terjadi kesalahan dalam pengubahan status notifikasi
//     echo "Terjadi kesalahan dalam pengubahan status notifikasi.";
// }
?>