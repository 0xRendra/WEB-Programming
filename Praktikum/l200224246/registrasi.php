<?php
// Tentukan direktori tempat menyimpan foto
$upload_dir = "dump";

// Inisialisasi variabel error
$error_nama = $error_foto = $error_email = $error_kelamin = $error_umur = $error_username = $error_password = "";

// Fungsi validasi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["nama"])) {
        $error_nama = "Hanya huruf dan spasi yang diperbolehkan";
    }

    // Validasi Foto
    if (empty($_FILES["foto"]["name"])) {
        $error_foto = "Foto harus diisi";
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $error_email = "Email harus diisi";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email tidak valid";
    }

    // Validasi Kelamin
    if (!isset($_POST["kelamin"])) {
        $error_kelamin = "Jenis kelamin harus diisi";
    }

    // Validasi Umur
    if (empty($_POST["umur"])) {
        $error_umur = "Umur harus diisi";
    } elseif (!is_numeric($_POST["umur"])) {
        $error_umur = "Umur harus berupa angka";
    }

    // Validasi Username
    if (empty($_POST["username"])) {
        $error_username = "Username harus diisi";
    } elseif (strlen($_POST["username"]) > 10) {
        $error_username = "Username tidak boleh lebih dari 10 karakter";
    }

    // Validasi Password
    if (empty($_POST["password"])) {
        $error_password = "Password harus diisi";
    } elseif (strlen($_POST["password"]) > 10) {
        $error_password = "Password tidak boleh lebih dari 10 karakter";
    }

    // Validasi Retype Password
    if ($_POST["password"] != $_POST["retype_password"]) {
        $error_password = "Password tidak sesuai";
    }

    // Jika tidak ada error, maka data berhasil diisi
    if (empty($error_nama) && empty($error_foto) && empty($error_email) && empty($error_kelamin) && empty($error_umur) && empty($error_username) && empty($error_password)) {
        // Simpan foto ke direktori
        $foto_name = $_FILES["foto"]["name"];
        $foto_path = $upload_dir . $foto_name;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_path);

        // Simpan data ke sesi atau database
        session_start();
        $_SESSION["nama"] = $_POST["nama"];
        $_SESSION["foto"] = $foto_path; // Simpan path foto
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["kelamin"] = $_POST["kelamin"];
        $_SESSION["umur"] = $_POST["umur"];
        $_SESSION["username"] = $_POST["username"];
        // Redirect ke halaman lain untuk menampilkan data
        header("Location: tampilkan_data.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi</title>
</head>
<body>

<h2>Form Registrasi</h2>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table border='0' width='30%'>
        <tr>
            <td width='25%'>Nama</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="nama"><span class="error"><?php echo $error_nama;?></span></td>
        </tr>
        <tr>
            <td width='25%'>Foto</td>
            <td width='5%'>:</td>
            <td width='65'><input type="file" name="foto"><span class="error"><?php echo $error_foto;?></span></td>
        </tr>
        <tr>
            <td width='25%'>Email</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="email"><span class="error"><?php echo $error_email;?></span></td>
        </tr><tr>
            <td width='25%'>Kelamin</td>
            <td width='5%'>:</td>
            <td width='65'>
            <input type="radio" name="kelamin" value="Laki-laki">Laki-laki
            <input type="radio" name="kelamin" value="Perempuan">Perempuan
            <span class="error"><?php echo $error_kelamin;?></span></td>
        </tr><tr>
            <td width='25%'>Umur</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="umur"><span class="error"><?php echo $error_umur;?></span></td>
        </tr>
        <tr>
            <td width='25%'>Username</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="username"><span class="error"><?php echo $error_username;?></span></td>
        </tr>
        <tr>
            <td width='25%'>Password</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="password"><span class="error"><?php echo $error_password;?></span></td>
        </tr><tr>
            <td width='25%'>Retype Password</td>
            <td width='5%'>:</td>
            <td width='65'><input type="text" name="retype_password"><span class="error"><?php echo $error_password;?></span></td>
        </tr>
    </table>
    <br><br>
    <input type="submit" name="submit" value="Registrasi">
</form>

</body>
</html>
