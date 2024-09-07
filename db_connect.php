<?php
$servername = "localhost";
$username = "root";  // Ganti dengan username database kamu
$password = "";  // Ganti dengan password database kamu
$dbname = "mywebsite";  // Nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
