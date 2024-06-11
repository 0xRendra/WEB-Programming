<?php
session_start();
// Memulai session

session_destroy();
// Menghancurkan session yang sedang berjalan
?>

<script language="JavaScript">
alert('Anda telah logout');
document.location='login.php';
// Menampilkan pesan logout dan mengalihkan ke halaman login.php
</script>