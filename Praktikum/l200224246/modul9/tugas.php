<?php
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Dapatkan status user dari session
$status_user = $_SESSION['status'];

echo "Anda berhasil Login sebagai : ";
echo $_SESSION['username'] . " dan Anda terdaftar sebagai ";
echo $status_user;
?>

<br>
<a href='logout.php'>Disini</a> untuk Logout

<?php
// Tampilkan konten yang sesuai dengan status user
if ($status_user == "Administrator") {
    // Tampilkan konten untuk Administrator
    echo "<h2>Halaman Administrator</h2>";
    echo "Ini adalah halaman khusus untuk Administrator.";
} else {
    // Tampilkan konten untuk Member
    echo "<h2>Halaman Member</h2>";
    echo "Ini adalah halaman khusus untuk Member.";
}
?>