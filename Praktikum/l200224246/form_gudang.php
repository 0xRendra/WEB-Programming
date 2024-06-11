<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
</head>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'warehouse');
?>
<body>
<h3>Masukkan Data Barang :</h3>
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>Kode Barang</td>
<td width='5%'>:</td>
<td width='50%'><input type="text" name='kode_barang' size='10'></td></tr>
<tr><td width='25%'>Nama Barang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama_barang' size='30'></td></tr>
<tr><td width='25%'>Gudang</td>
<td width='5%'>:</td>
<td width='65%'>
<select name='kode_gudang'>
<?php
$sql = "SELECT * FROM gudang";
$retval = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($retval)) {
  echo "<option value='" . $row['kode_gudang'] . "'>" . $row['nama_gudang'] . "</option>";
}
?>
</select>
</td></tr>
</table>
<input type="submit" value="Masukkan" name="submit">
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $kode_barang = $_POST['kode_barang'];
  $nama_barang = $_POST['nama_barang'];
  $kode_gudang = $_POST['kode_gudang'];

  $input = "INSERT INTO barang(kode_barang, nama_barang, kode_gudang) VALUES ('$kode_barang', '$nama_barang', '$kode_gudang')";

  if ($kode_barang == '') {
    echo "</br>Kode Barang tidak boleh kosong, diisi dulu";
  } elseif ($nama_barang == '') {
    echo "</br>Nama Barang tidak boleh kosong, diisi dulu";
  } else {
    mysqli_query($conn, $input);
    echo '</br>Data berhasil dimasukkan';
  }
}
?>

<hr>
<H3 align='center'>Data Barang</H3>
<table align='center' border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Barang</b></td>
<td align='center' width='20%'><b>Nama Barang</b></td>
<td align='center' width='15%'><b>Nama Gudang</b></td>
<td align='center' width='15'><b>Lokasi Gudang</b></td>
</tr>
<?php
$cari = "SELECT barang.kode_barang, barang.nama_barang, gudang.nama_gudang, gudang.lokasi 
         FROM barang 
         INNER JOIN gudang ON barang.kode_gudang = gudang.kode_gudang";
$hasil_cari = mysqli_query($conn, $cari);
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "<tr>
        <td width='20%'>$data[0]</td>
        <td width='20%'>$data[1]</td>
        <td width='15%'>$data[2]</td>
        <td width='15%'>$data[3]</td>
        </tr>";
}
?>
</table>
</body>
</html>