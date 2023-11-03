<?php 
include '../src/php/config.php';
include '../src/php/auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "UPDATE lamaran SET status = 'declined' WHERE lamaran_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: ../pekerjaan/');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>