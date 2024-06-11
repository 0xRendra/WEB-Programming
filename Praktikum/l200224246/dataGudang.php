<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gudang</title>
</head>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'warehouse');
?>
<body>
<center>
<h3>Data Gudang:</h3>
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>Kode Gudang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='kode_gudang' size='10' maxlength="10"></td></tr>
<td width='25%'>Nama Gudang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama_gudang' size='30' maxlength="50"></td></tr>
<td width='25%'>Lokasi</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='lokasi' size='40' maxlength="100"></td></tr>
</table>
<input type="submit" value="Tambah" name="submit_add">
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

// Insert new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_add'])) {
  $kode_gudang = $_POST['kode_gudang'];
  $nama_gudang = $_POST['nama_gudang'];
  $lokasi = $_POST['lokasi'];

  $input = "INSERT INTO Gudang(kode_gudang, nama_gudang, lokasi) VALUES ('$kode_gudang', '$nama_gudang', '$lokasi')";

  if ($kode_gudang == '') {
    echo "</br>Kode Gudang tidak boleh kosong, diisi dulu";
  } elseif ($nama_gudang == '') {
    echo "</br>Nama Gudang tidak boleh kosong, diisi dulu";
  } elseif ($lokasi == '') {
    echo "</br>Lokasi tidak boleh kosong, diisi dulu";
  } else {
    mysqli_query($conn, $input);
    echo '</br>Data berhasil dimasukkan';
  }
}
?>

<hr>
<H3>Daftar Gudang</H3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Gudang</b></td>
<td align='center' width='30%'><b>Nama Gudang</b></td>
<td align='center' width='30%'><b>Lokasi</b></td>
<td align='center' width='20%'><b>Action</b></td>
</tr>
<?php
$cari = "SELECT * FROM Gudang ORDER BY kode_gudang";
$hasil_cari = mysqli_query($conn, $cari);
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "
  <tr>
  <td width='20%'>$data[0]</td>
  <td width='30%'>$data[1]</td>
  <td width='30%'>$data[2]</td>
  <td width='20%' align='center'>
    <a href='?edit=$data[0]'>Edit</a>
    <a href='?delete=$data[0]'>Delete</a>
  </td>
  </tr>";
}

// Delete data from database
if (isset($_GET['delete'])) {
  $kode_delete = $_GET['delete'];

  // Delete related records from Barang table
  $delete_barang_query = "DELETE FROM Barang WHERE kode_gudang = '$kode_delete'";
  mysqli_query($conn, $delete_barang_query);

  // Delete record from Gudang table
  $delete_query = "DELETE FROM Gudang WHERE kode_gudang = '$kode_delete'";
  mysqli_query($conn, $delete_query);

  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

// Edit data in the database
if (isset($_GET['edit'])) {
  $kode_edit = $_GET['edit'];
  $edit_query = "SELECT * FROM Gudang WHERE kode_gudang = '$kode_edit'";
  $hasil_edit = mysqli_query($conn, $edit_query);
  $row_edit = mysqli_fetch_assoc($hasil_edit);
}

if (isset($_POST['submit_edit'])) {
  $kode_edit = $_POST['kode_edit'];
  $nama_edit = $_POST['nama_edit'];
  $lokasi_edit = $_POST['lokasi_edit'];

  $update_query = "UPDATE Gudang SET nama_gudang = '$nama_edit', lokasi = '$lokasi_edit' WHERE kode_gudang = '$kode_edit'";
  mysqli_query($conn, $update_query);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>

<?php
if (isset($_GET['edit'])) {
  echo '
  <h3>Edit Data Gudang</h3>
  <form method="POST" action="' . $_SERVER['PHP_SELF'] . '">
    <input type="hidden" name="kode_edit" value="' . $row_edit['kode_gudang'] . '">
    <table border="0" width="30%">
      <tr>
        <td width="25%">Kode Gudang</td>
        <td width="5%">:</td>
        <td width="65%">' . $row_edit['kode_gudang'] . '</td>
      </tr>
      <tr>
        <td width="25%">Nama Gudang</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="nama_edit" value="' . $row_edit['nama_gudang'] . '" size="30" maxlength="50"></td>
      </tr>
      <tr>
        <td width="25%">Lokasi</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="lokasi_edit" value="' . $row_edit['lokasi'] . '" size="40" maxlength="100"></td>
      </tr>
    </table>
    <input type="submit" name="submit_edit" value="Update">
  </form>
  ';
}
?>
</table></center></body></html>