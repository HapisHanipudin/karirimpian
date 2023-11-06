<?php 
include '../src/php/config.php';
include '../src/php/auth.php';

$readSql = "UPDATE notif SET status = 'read' WHERE tujuan = '$userId'";
$result = mysqli_query($conn, $readSql);

// if ($result) {
//     // Pengubahan status berhasil, arahkan pengguna ke halaman terakhir yang dikunjungi
//         header("Location: " . $_SESSION['last_visited_page']);
//     exit;
// } else {
//     // Terjadi kesalahan dalam pengubahan status notifikasi
//     echo "Terjadi kesalahan dalam pengubahan status notifikasi.";
// }
?>