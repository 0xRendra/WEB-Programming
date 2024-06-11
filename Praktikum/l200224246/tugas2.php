<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Odd or Even</title>
</head>
<body>
  <form action="tugas2.php" method='POST'>
    <p>Masukkan sebuah angka <input type="text" size='20' name="angka"></p>
    <p><input type="submit" value='tentukan' name='submit'></p>
  </form>

  <?php
    error_reporting(E_ALL ^ E_NOTICE);

    if(isset($_POST['submit'])) {
      $angka = $_POST['angka'];

      // Convert the input value to an integer
      $angka = (int)$angka;

      // Determine if the number is odd or even
      if($angka % 2 == 0) {
        echo "<br/>Angka $angka merupakan bilangan genap.";
      } else {
        echo "<br/>Angka $angka merupakan bilangan ganjil.";
      }
    }
  ?>
</body>
</html>