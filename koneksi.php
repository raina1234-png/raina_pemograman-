<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "belajar_db";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Error Handling (Pengecekan Koneksi)
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>