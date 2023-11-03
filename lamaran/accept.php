<?php 
include '../src/php/config.php';
include '../src/php/auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $getUserAndJob = "SELECT l.*, u.*, j.* FROM lamaran l JOIN users u ON l.user_id = u.user_id JOIN loker j ON l.job_id = j.id WHERE l.lamaran_id = '$id'";
    $getUserAndJobResult = mysqli_query($conn, $getUserAndJob);
    $getUserAndJobRow = mysqli_fetch_assoc($getUserAndJobResult);
    $workId = uniqid();
    $workUser =  $getUserAndJobRow['user_id'];
    $workerName =  $getUserAndJobRow['username'];
    $workName = $getUserAndJobRow['name'];
    $workCompany = $getUserAndJobRow['company'];

    $workSql = "INSERT INTO worker (works_id, user_id, company_id, work_name) VALUES ('$workId', '$workUser', '$workCompany', '$workName')";
    $workResult = mysqli_query($conn, $workSql);

    $sql = "UPDATE lamaran SET status = 'accepted' WHERE lamaran_id = '$id'";
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