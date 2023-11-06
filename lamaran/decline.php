<?php 
include '../src/php/config.php';
include '../src/php/auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "UPDATE lamaran SET status = 'declined' WHERE lamaran_id = '$id'";

    $getUserAndJob = "SELECT l.*, u.*, j.* FROM lamaran l JOIN users u ON l.user_id = u.user_id JOIN loker j ON l.job_id = j.id WHERE l.lamaran_id = '$id'";
    $getUserAndJobResult = mysqli_query($conn, $getUserAndJob);
    $getUserAndJobRow = mysqli_fetch_assoc($getUserAndJobResult);
    $workUser =  $getUserAndJobRow['user_id'];
    $workName =  $getUserAndJobRow['name'];


    $notifId = uniqid();
    $notif = "Your application for $workName has been declined by $username.";
    $notifSql = "INSERT INTO notif (notif_id, sender, tujuan, message) VALUES ('$notifId', '$userId', '$workUser', '$notif')";
    $notifExec = mysqli_query($conn, $notifSql);

    $result = mysqli_query($conn, $sql);
    if ($result && $notifExec) {
        header('location: ../pekerjaan/');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>