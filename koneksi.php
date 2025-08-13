<?php
$host = "localhost";
$user = "root";
$pass = "000000";
$db   = "sekolah";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
