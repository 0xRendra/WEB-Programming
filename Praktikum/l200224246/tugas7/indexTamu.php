<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan data dari database</title>
</head>
<body>
    <a href="tambahTamu.php">+ Tambah Data Baru</a>
    <h3>Data Tamu</h3>
    <table width="60%" border="1">
        <tr>
            <th>No</th>
            <th>ID Tamu</th>
            <th>Nama Tamu</th>
            <th>Jenis Kelamin</th>
            <th>Kontak</th>
            <th>Email</th>
            <th>Tanggal</th>
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

        // Mengambil data dari tabel tamu
        $query = mysqli_query($conn, "SELECT * FROM tamu ORDER BY id_tamu ASC");

        // Memeriksa apakah query berhasil dieksekusi
        if (!$query) {
            die("Query Error: " . mysqli_error($conn));
        }

        $nomor = 1;
        // Menampilkan hasil data jika query berhasil dieksekusi dan mengembalikan hasil yang valid
        while($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $nomor++ . "</td>";
            echo "<td>" . $data['id_tamu'] ."</td>";
            echo "<td>" . $data['nama_tamu'] . "</td>";
            echo "<td>" . $data['jenis_kelamin'] . "</td>";
            echo "<td>" . $data['kontak_tamu'] . "</td>"; // Menampilkan kontak
            echo "<td>" . $data['email_tamu'] . "</td>";
            echo "<td>" . $data['tanggal'] . "</td>";
            echo "<td>
                    <a href='editTamu.php?id=" . $data['id_tamu'] . "'>Edit</a> | 
                    <a href='hapusTamu.php?id=" . $data['id_tamu'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
