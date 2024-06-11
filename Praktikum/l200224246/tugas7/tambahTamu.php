<!doctype html>
<html>
<head>
    <title>Menambah Data</title>
</head>

<body>

<h1>Tambah Data Tamu</h1>

<!-- Form untuk menambahkan data tamu -->
<form action="tambahTamu.php" method="post">
    <table width="50%">
        <!-- Field input untuk ID Tamu -->
        <tr> 
            <td>ID Tamu:</td>
            <td><input type="text" name="id_tamu" id="id_tamu" required /></td>
        </tr>

        <!-- Field input untuk Nama Tamu -->
        <tr> 
            <td>Nama:</td>
            <td><input type="text" name="nama_tamu" id="nama_tamu" required /></td>
        </tr>

        <!-- Field input untuk Jenis Kelamin -->
        <tr> 
            <td>Jenis Kelamin:</td> 
            <td>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="Laki-laki" required>
                <label for="jenis_kelamin_l">Laki-laki</label>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="Perempuan" required>
                <label for="jenis_kelamin_p">Perempuan</label>
            </td> 
        </tr>
        
        <!-- Field input untuk Kontak -->
        <tr>
            <td>Kontak:</td>
            <td><input type="text" name="kontak_tamu" id="kontak_tamu" maxlength="12" required></td>
        </tr>
        
        <!-- Field input untuk Email -->
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email_tamu" id="email_Tamu" required></td>
        </tr>
        
        <!-- Field input untuk Tanggal, dengan nilai default hari ini -->
        <tr>
            <td>Tanggal:</td>
            <td><input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" id="tanggal" required></td>
        </tr>
        
        <!-- Tombol untuk mengirimkan data -->
        <tr>
            <td><button type="submit" name="submit">Tambah Data</button></td>
        </tr>
    </table>
</form>

<?php

// Memasukkan file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Memproses data saat form disubmit
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_tamu']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama_tamu']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $kontak = mysqli_real_escape_string($conn, $_POST['kontak_tamu']);
    $email = mysqli_real_escape_string($conn, $_POST['email_tamu']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);

    // Query SQL untuk menambahkan data ke database
    $query = "INSERT INTO tamu (id_tamu, nama_tamu, jenis_kelamin, kontak_tamu, email_tamu, tanggal) VALUES('$id', '$nama', '$jenis_kelamin', '$kontak', '$email', '$tanggal')";
    
    // Mengeksekusi query dan menampilkan pesan ke pengguna
    if (mysqli_query($conn, $query)) {
        echo "<p>Data berhasil ditambahkan.</p>";
        header('location: indexTamu.php'); // Mengarahkan pengguna ke halaman indexTamu.php
    } else {
        echo "<p>Gagal menambahkan data: " . mysqli_error($conn) . "</p>"; // Menampilkan pesan error jika query gagal dieksekusi
    }
}

?>

</body>
</html>
