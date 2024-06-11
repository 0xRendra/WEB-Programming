<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Buku</title>
</head>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'buku');
?>
<body>
<h3>Masukkan Data Buku :</h3>
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>Kode Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='kode_buku' size='10'></td></tr>
<tr><td width='25%'>Nama Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama_buku' size='30'></td></tr>
<tr><td width='25%'>Jenis Buku</td>
<td width='5%'>:</td>
<td width='65%'>
<select name='kode_jenis'>
<?php
$sql = "SELECT * FROM jenis_buku";
$retval = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($retval)) {
  echo "<option value='" . $row['kode_jenis'] . "'>" . $row['nama_jenis'] . "</option>";
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
  $kode_buku = $_POST['kode_buku'];
  $nama_buku = $_POST['nama_buku'];
  $kode_jenis = $_POST['kode_jenis'];

  $input = "INSERT INTO buku(kod_buku, nama_buku, kode_jenis) VALUES ('$kode_buku', '$nama_buku', '$kode_jenis')";

  if ($kode_buku == '') {
    echo "</br>Kode Buku tidak boleh kosong, diisi dulu";
  } elseif ($nama_buku == '') {
    echo "</br>Nama Buku tidak boleh kosong, diisi dulu";
  } else {
    mysqli_query($conn, $input);
    echo '</br>Data berhasil dimasukkan';
  }
}
?>

<hr>
<H3 align='center'>Data Buku</H3>
<table align='center' border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Buku</b></td>
<td align='center' width='20%'><b>Nama Buku</b></td>
<td align='center' width='15%'><b>Jenis Buku</b></td>
<td align='center' width='30%'><b>Keterangan Jenis</b></td>
</tr>
<?php
$cari = "SELECT buku.kod_buku, buku.nama_buku, buku.kode_jenis, jenis_buku.keterangan 
         FROM buku 
         INNER JOIN jenis_buku ON buku.kode_jenis = jenis_buku.kode_jenis";
$hasil_cari = mysqli_query($conn, $cari);
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "<tr>
        <td width='20%'>$data[0]</td>
        <td width='20%'>$data[1]</td>
        <td width='15%'>$data[2]</td>
        <td width='30%'>$data[3]</td>
        </tr>";
}
?>
</table>
</body>
</html>