<?php
include 'koneksi.php';

// Memeriksa apakah parameter ID telah diterima melalui URL
if(isset($_GET["id"])) {
    // Menghindari serangan SQL injection dengan menggunakan mysqli_real_escape_string
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Membuat query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM kamar WHERE id_kamar='$id'";
    
    // Menjalankan query
    if(mysqli_query($conn, $query)) {
        // Redirect kembali ke halaman index setelah berhasil menghapus data
        header("Location: indexKamar.php");
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
