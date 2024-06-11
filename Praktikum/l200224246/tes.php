<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variable</title>
</head>
<body>
  <h1>Buku Tamu</h1>
  <form method='POST' action='variable.php'>
    <p>Nama : <input type="text" name="nama" size="20"></p>
    <p>Email : <input type="text" name="nama" size="20"></p>
    <p>Komentar : <input type="text" name="nama" size="20"></p>
    <p><input type="submit" value="kirim" name="submit"></p>
  </form>
  <?php
    error _ reporting (E _ ALL ^ E _ NOTICE);
    $nama = $ _ POST['nama'];
    $email = $ _ POST['email'];
    $komentar = $ _ POST['komentar'];
    $submit = $ _ POST['submit'];
    if($submit){
    echo"</br>Nama : $nama";
    echo"</br>Email : $email";
    echo"</br>Komentar : $komentar";
    } ?>
</body>
</html>