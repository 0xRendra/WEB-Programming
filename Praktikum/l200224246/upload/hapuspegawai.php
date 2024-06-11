<?php 
include 'koneksi.php'; 

// Mendapatkan ID pegawai dari URL
$id = $_GET["id"];

// Menghindari SQL Injection dengan menggunakan parameterized query
$query = mysqli_prepare($conn, "DELETE FROM pegawai WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);
mysqli_stmt_close($query);

// Redirect kembali ke halaman pegawai setelah penghapusan
header("Location: pegawai.php"); 
?>
