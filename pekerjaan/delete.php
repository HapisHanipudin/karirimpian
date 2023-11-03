<?php
session_start();

include '../src/php/config.php';

// Periksa apakah parameter "id" telah diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan penghapusan data berdasarkan ID
    $sql = "DELETE FROM pekerjaan WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman home.php
        header('location: home.php');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>
