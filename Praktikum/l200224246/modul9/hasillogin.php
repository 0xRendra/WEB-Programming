<?php
session_start();
echo "Anda berhasil Login sebagai : ";
echo $_SESSION['username']." dan Anda terdaftar sebagai ";
echo $_SESSION['status'];
?>
<br>

<a href='logout.php'> Disini </a> untuk Logout