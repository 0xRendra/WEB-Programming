<?php
// melakukan koneksi database
include "koneksi.php";
// melakukan query - mengambil data dari database
$query = mysqli_query($conn, "SELECT * FROM pegawai ORDER BY id ASC");
?>
<html>

<head>
    <title>Menampilkan data pegawai dari database</title>

<body>
    <a href="tambahpegawai.php">+ Tambah Data Pegawai</a>
    <h3>Data Pegawai</h3>
    <table width='60%' border="1">
        <tr>
            <th>No</th>
            <th>ID Pegawai</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Gambar</th>
        </tr>
        <?php
        $nomor = 1;
        // menampilkan data
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $data['id']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['divisi']; ?></td>
                <td><img src="photo/<?= $data["gambar"]; ?>" width="50" height="50"></td>
                <td><a class="edit" href="editpegawai.php?id=<?= $data['id']; ?>">Edit</a> |
                    <a class="hapus" href="hapuspegawai.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>

