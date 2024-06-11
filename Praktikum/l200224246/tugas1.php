<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pertambahan</title>
</head>
<body>
  <form action="tugas1.php" method='POST'>
    <p>Value A is <input type="text" size='20' name="a"></p>
    <p>Value B is <input type="text" size='20' name="b"></p>
    <p><input type="submit" value='jumlahkan' name='submit'></p>
  </form>

  <?php
    error_reporting(E_ALL ^ E_NOTICE);

    if(isset($_POST['submit'])) {
      $a = $_POST['a'];
      $b = $_POST['b'];

      // Convert the input values to integers
      $a = (int)$a;
      $b = (int)$b;

      echo "<br/>Nilai A adalah : $a";
      echo "<br/>Nilai B adalah : $b";
      echo "<br/>Jadi nilai A ditambah B adalah " . ($a + $b);
    }
  ?>
</body>
</html>