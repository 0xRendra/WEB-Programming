<?php
// Informasi koneksi ke database
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "pegawai";

// Membuat koneksi ke database
$conn = mysqli_connect($server, $user, $password, $nama_database);

// Memeriksa apakah koneksi berhasil dibuat
if (!$conn) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan eksekusi skrip
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
