<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Registrasi</title>
</head>
<body>

<h2>Data Registrasi</h2>
<p>Nama: <?php echo $_SESSION["nama"]; ?></p>
<p>Email: <?php echo $_SESSION["email"]; ?></p>
<p>Kelamin: <?php echo $_SESSION["kelamin"]; ?></p>
<p>Umur: <?php echo $_SESSION["umur"]; ?></p>
<p>Username: <?php echo $_SESSION["username"]; ?></p>
<p>Foto: <img src="<?php echo $_SESSION["foto"]; ?>" alt="Foto" width="200"></p>

</body>
</html>
