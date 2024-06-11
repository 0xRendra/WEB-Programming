<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'informatika');
?>
<body>
<center>
<h3>Masukkan Data Mahasiswa :</h3>
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>NIM</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nim' size='10' maxlength="10"></td></tr>
<td width='25%'>Nama</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama' size='30' maxlength="50"></td></tr>
<td width='25%'>Kelas</td>
<td width='5%'>:</td>
<td width='65%'>
  <input type="radio" value='A' name='kelas' checked>A
  <input type="radio" value='B' name='kelas'>B
  <input type="radio" value='C' name='kelas'>C
</td></tr>
<td width='25%'>Alamat</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='alamat' size='40' maxlength="50"></td></tr>
</table>
<input type="submit" value="Masukkan" name="submit">
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $alamat = $_POST['alamat'];
  $submit = $_POST['submit'];

  $input = "INSERT INTO mahasiswa(NIM, Nama, Kelas, Alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')";

  if ($submit) {
    if ($nim == '') {
      echo "</br>NIM tidak boleh kosong, diisi dulu";
    } elseif ($nama == '') {
      echo "</br>Nama tidak boleh kosong, diisi dulu";
    } elseif ($alamat == '') {
      echo "</br>Alamat tidak boleh kosong, diisi dulu";
    } else {
      mysqli_query($conn, $input);
      echo '</br>Data berhasil dimasukkan';
    }
  }
}
?>

<hr>
<H3>Data Mahasiswa</H3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>NIM</b></td>
<td align='center' width='30%'><b>Nama</b></td>
<td align='center' width='10%'><b>Kelas</b></td>
<td align='center' width='30%'><b>Alamat</b></td>
<td align='center' width='10%'><b>Action</b></td>
</tr>
<?php
$cari = "SELECT * FROM mahasiswa ORDER BY NIM";
$hasil_cari = mysqli_query($conn, $cari);
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "
  <tr>
  <td width='20%'>$data[0]</td>
  <td width='30%'>$data[1]</td>
  <td width='10%'>$data[2]</td>
  <td width='30%'>$data[3]</td>
  <td width='10%' align='center'>
    <a href='?edit=$data[0]'>Edit</a>
    <a href='?delete=$data[0]'>Delete</a>
  </td>
  </tr>";
}

// Delete data from database
if (isset($_GET['delete'])) {
  $nim_delete = $_GET['delete'];
  $delete_query = "DELETE FROM mahasiswa WHERE NIM = '$nim_delete'";
  mysqli_query($conn, $delete_query);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

// Edit data in the database
if (isset($_GET['edit'])) {
  $nim_edit = $_GET['edit'];
  $edit_query = "SELECT * FROM mahasiswa WHERE NIM = '$nim_edit'";
  $hasil_edit = mysqli_query($conn, $edit_query);
  $row_edit = mysqli_fetch_assoc($hasil_edit);
}

if (isset($_POST['submit_edit'])) {
  $nim_edit = $_POST['nim_edit'];
  $nama_edit = $_POST['nama_edit'];
  $kelas_edit = $_POST['kelas_edit'];
  $alamat_edit = $_POST['alamat_edit'];

  $update_query = "UPDATE mahasiswa SET Nama = '$nama_edit', Kelas = '$kelas_edit', Alamat = '$alamat_edit' WHERE NIM = '$nim_edit'";
  mysqli_query($conn, $update_query);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>

<?php
if (isset($_GET['edit'])) {
  echo '
  <h3>Edit Data Mahasiswa</h3>
  <form method="POST" action="' . $_SERVER['PHP_SELF'] . '">
    <input type="hidden" name="nim_edit" value="' . $row_edit['NIM'] . '">
    <table border="0" width="30%">
      <tr>
        <td width="25%">NIM</td>
        <td width="5%">:</td>
        <td width="65%">' . $row_edit['NIM'] . '</td>
      </tr>
      <tr>
        <td width="25%">Nama</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="nama_edit" value="' . $row_edit['Nama'] . '" size="30" maxlength="50"></td>
      </tr>
      <tr>
        <td width="25%">Kelas</td>
        <td width="5%">:</td>
        <td width="65%">
          <input type="radio" name="kelas_edit" value="A" ' . ($row_edit['Kelas'] == 'A' ? 'checked' : '') . '>A
          <input type="radio" name="kelas_edit" value="B" ' . ($row_edit['Kelas'] == 'B' ? 'checked' : '') . '>B
          <input type="radio" name="kelas_edit" value="C" ' . ($row_edit['Kelas'] == 'C' ? 'checked' : '') . '>C
        </td>
      </tr>
      <tr>
        <td width="25%">Alamat</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="alamat_edit" value="' . $row_edit['Alamat'] . '" size="40" maxlength="50"></td>
      </tr>
    </table>
    <input type="submit" name="submit_edit" value="Update">
  </form>
  ';
}
?>
</table></center></body></html>