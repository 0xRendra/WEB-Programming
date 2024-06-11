<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan data dari database</title>
</head>
<body>
    <a href="tambahKamar.php">+ Tambah Data Baru</a>
    <h3>Data Kamar</h3>
    <table width="60%" border="1">
        <tr>
            <th>No</th>
            <th>ID Kamar</th>
            <th>Jenis Kamar</th>
            <th>Biaya</th>
            <th>Fasilitas</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Melakukan koneksi ke database
        $server = "localhost";
        $user = "root";
        $password = "";
        $nama_database = "hotel";
        $conn = mysqli_connect($server, $user, $password, $nama_database);
 
        // Memeriksa koneksi database
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Mengambil data dari tabel kamar
        $query = mysqli_query($conn, "SELECT * FROM kamar ORDER BY id_kamar ASC");

        // Memeriksa apakah query berhasil dieksekusi
        if (!$query) {
            die("Query Error: " . mysqli_error($conn));
        }

        $nomor = 1;
        // Menampilkan hasil data jika query berhasil dieksekusi dan mengembalikan hasil yang valid
        while($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $nomor++ . "</td>";
            echo "<td>" . $data['id_kamar'] ."</td>";
            echo "<td>" . $data['jenis_kamar'] . "</td>";
            echo "<td>" . $data['biaya'] . "</td>";
            echo "<td>" . $data['fasilitas'] . "</td>";
            echo "<td>
                    <a href='editKamar.php?id=" . $data['id_kamar'] . "'>Edit</a> | 
                    <a href='hapusKamar.php?id=" . $data['id_kamar'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
