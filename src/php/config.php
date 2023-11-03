<?php 
$server = "localhost";
$user = "root";
$password = "";
$database = "karirimpian";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("
    <script>alert('Connection Failed')</script>
    ");
}


?>
