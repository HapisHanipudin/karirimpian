<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user_id'])) {
    // Jika sudah login, tampilkan username
    $username = $_SESSION['username'];
    $userId = $_SESSION['user_id'];
    $acctype = $_SESSION['acctype'];
    $userEcho = 'data-username="' . $username . '" data-userid="' . $userId . '" data-acctype="' . $acctype . '"';

} else {
    // Jika belum login, biarkan $username kosong
    $username = '';
    $userId = '';
    $acctype = '';
    $userEcho = '';
}

?>
