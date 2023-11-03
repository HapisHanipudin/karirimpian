<?php 
    session_start();
    $_SESSION["username"] = 'udin';
    $_SESSION["user_id"] = '1';
    $_SESSION["acctype"] = 'company';

    header('location: ../');
    exit;
    
?>