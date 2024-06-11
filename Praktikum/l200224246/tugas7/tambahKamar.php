<!doctype html>
<html>
<head>
    <title>Menambah Data</title>
</head>

<body>

<h1>Tambah Data Kamar</h1>

<form action="tambahKamar.php" method="post">
    <table width="50%">
        <!-- Field input untuk ID Kamar -->
        <tr> 
            <td>ID Kamar:</td>
            <td><input type="text" name="id_kamar" id="id_kamar" required /></td>
        </tr>

        <!-- Field input untuk Jenis Kamar -->
        <tr> 
            <td>Jenis Kamar:</td> 
            <td>
                <input type="radio" name="jenis_kamar" id="jenis_kamar_eko" value="Ekonomis" required>
                <label for="jenis_kamar_eko">Ekonomis</label>
                <input type="radio" name="jenis_kamar" id="jenis_kamar_ekse" value="Eksekutif" required>
                <label for="jenis_kamar_ekse">Eksekutif</label>
                <input type="radio" name="jenis_kamar" id="jenis_kamar_vip" value="VIP" required>
                <label for="jenis_kamar_vip">VIP</label>
            </td> 
        </tr>

        <!-- Field input untuk Biaya -->
        <tr> 
            <td>Biaya:</td>
            <td><input type="text" name="biaya" id="biaya" required /></td>
        </tr>

        <!-- Field input untuk Fasilitas -->
        <tr>
            <td>Fasilitas:</td>
            <td><input type="text" name="fasilitas" id="fasilitas" required></td>
        </tr>
        
        <!-- Tombol untuk mengirimkan data -->
        <tr>
            <td><button type="submit" name="submit">Tambah Data</button></td>
        </tr>
    </table>
</form>

<?php
// Membuat koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Mengambil data dari form dan menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $_POST['id_kamar']);
    $jenis_kamar = mysqli_real_escape_string($conn, $_POST['jenis_kamar']);
    $biaya = mysqli_real_escape_string($conn, $_POST['biaya']);
    $fasilitas = mysqli_real_escape_string($conn, $_POST['fasilitas']);
    
    // Query SQL untuk menambahkan data ke database
    $query = "INSERT INTO kamar (id_kamar, jenis_kamar, biaya, fasilitas) VALUES('$id', '$jenis_kamar', '$biaya', '$fasilitas')";
    
    // Mengeksekusi query dan menampilkan pesan ke pengguna
    if (mysqli_query($conn, $query)) {
        echo "<p>Data berhasil ditambahkan.</p>";
        header('location: indexKamar.php'); // Mengarahkan pengguna ke halaman indexKamar.php
    } else {
        echo "<p>Gagal menambahkan data: " . mysqli_error($conn) . "</p>"; // Menampilkan pesan error jika query gagal dieksekusi
    }
}

?>

</body>
</html>
