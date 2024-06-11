<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'informatika');

// ambil data dari form
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';

// jika tombol submit ditekan
if ($submit) {
    // query untuk mencari data user
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql); // Ganti mysql_query menjadi mysqli_query
    $row = mysqli_fetch_array($query); // Ganti mysql_fetch_array menjadi mysqli_fetch_array

    // jika data ditemukan
    if (!empty($row['username'])) {
        // buat session
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
        ?>
        <script language="JavaScript">
            alert('Anda Login Sebagai <?php echo $row['username']; ?>');
            document.location = "hasillogin.php";
        </script>
        <?php
    } else {
        // gagal login
        ?>
        <script language="JavaScript">
            alert('Gagal Login');
            document.location = "login.php";
        </script>
        <?php
    }
}
?>

<form method='post' action='login.php'>
    <p align='center'>
        Username : <input type='text' name='username'><br>
        Password : <input type='password' name='password'><br>
        <input type='submit' name='submit'>
    </p>
</form>
</body>
</html>