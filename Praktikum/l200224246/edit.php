<?php
$conn = mysqli_connect('localhost', 'root', '', 'informatika');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="nim" value="<?php echo $data['NIM']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $data['Nama']; ?>"><br>
        <label>Kelas:</label>
        <input type="radio" name="kelas" value="A" <?php if ($data['Kelas'] == 'A') echo 'checked'; ?>>A
        <input type="radio" name="kelas" value="B" <?php if ($data['Kelas'] == 'B') echo 'checked'; ?>>B
        <input type="radio" name="kelas" value="C" <?php if ($data['Kelas'] == 'C') echo 'checked'; ?>>C<br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $data['Alamat']; ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>