<?php
//melakukan koneksi ke database
include 'koneksi.php';
//mengambil data berdasarkan id dari url
$id = $_GET["id"];
//mengambil data untuk ditampilkan pada form
$query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id = '$id'");
//jika submit ditekan maka proses update data dilakukan
if (isset($_POST['submit'])) {
var_dump($_POST);
$id = $_POST['id'];
$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$gambarLama = $_POST['gambarLama'];
// cek jika user mengubah gambar
if ($_FILES['gambar']['error'] === 4 ) {
$gambar = $gambarLama;
}else{
$gambar = upload();
}
//update data
mysqli_query($conn, "UPDATE pegawai SET nama='$nama',divisi='$divisi',
gambar='$gambar' WHERE id = '$id'");
//kembali ke halaman index
header("Location: pegawai.php");
}
//memuat fungsi upload
function upload(){
$namaFile = $_FILES['gambar']['name'];
$ukuranFile = $_FILES['gambar']['size'];
$error = $_FILES['gambar']['error'];
$tmpName = $_FILES['gambar']['tmp_name'];
//cek apakah gambar sudah diupload
if ($error === 4) {echo "<script>
alert('gambar belum diupload');
</script>";
return false;
}
//cek apakah benar ekstensi gambar yang diupload
$ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
echo "<script>
alert('ekstensi gambar yang diperbolehkan adalah jpeg, jpg, png');
</script>";
return false;
}
//cek jika size melebihi yang diperbolehkan
if ($ukuranFile > 500000) {
echo "<script>
alert('gambar melebihi ukuran yang diperbolehkan');
</script>";
return false;
}
//lolos pengecekan, file dimasukkan ke dalam database
//buat nama file menjadi unik
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;
move_uploaded_file($tmpName, 'photo/' . $namaFileBaru);
return $namaFileBaru;
}
?>
<?php
//jika data tersedia maka akan ditampilkan
while ($data = mysqli_fetch_assoc($query)) {
?>
<h1>Edit Data</h1>
<form action="editpegawai.php" enctype="multipart/form-data" method="post">
<input type="hidden" name="id" value="<?= $data["id"]; ?>">
<input type="hidden" name="gambarLama" value="<?= $data["gambar"]; ?>">
<table>
<tr>
<td>Nama</td>
<td>: <input type="text" name="nama" id="nama" required value="<?=
$data["nama"]; ?>" /></td>
</tr>
<tr>
<td>Divisi</td>
<td>: <input type="text" name="divisi" id="divisi" value="<?=
$data["divisi"]; ?>"></td>
</tr>
<tr><td>Gambar</td>
<td>: <img src="photo/<?= $data["gambar"]; ?>" width="40">
<input type="file" name="gambar" id="gambar"></td>
</tr>
<tr>
<td><button type="submit" name="submit">Edit Data</button></td>
</tr>
</table>
</form>
<?php } ?>