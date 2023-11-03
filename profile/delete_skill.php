<?php
include '../src/php/config.php';
include '../src/php/auth.php';
// Periksa apakah parameter "id" telah diberikan
if (isset($_GET['skill_id'])) {
    $id = $_GET['skill_id'];
    
    // Lakukan penghapusan data berdasarkan ID
    $sql = "DELETE FROM skill WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman home.php
        header('location: ../profile/skills.php');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>
