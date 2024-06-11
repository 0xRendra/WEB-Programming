<?php
// Melakukan koneksi ke database
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "hotel";
$conn = mysqli_connect($server, $user, $password, $nama_database);

// Memeriksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Memeriksa apakah parameter ID telah diterima melalui URL
if(isset($_GET["id"])) {
    // Menghindari serangan SQL injection dengan menggunakan mysqli_real_escape_string
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Membuat query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM tamu WHERE id_tamu='$id'";
    
    // Menjalankan query
    if(mysqli_query($conn, $query)) {
        // Redirect kembali ke halaman index setelah berhasil menghapus data
        header("Location: indexTamu.php");
        exit; // Menghentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Menampilkan pesan kesalahan jika query tidak berhasil dieksekusi
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Menampilkan pesan jika parameter ID tidak ditemukan
    echo "ID tidak ditemukan.";
}
?>
