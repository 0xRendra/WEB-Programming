<?php
// Melakukan koneksi ke database
include 'koneksi.php';

// Pastikan parameter 'id' tersedia dalam URL
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id !== null) {
    // Query untuk mengambil data tamu berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu='$id'");

    // Pastikan data tamu tersedia
    if (mysqli_num_rows($query) > 0) {
        // Jika data tersedia maka akan ditampilkan
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <h1>Edit Data</h1>
            <form action="editTamu.php" method="post">
                <table>
                    <tr>
                        <td>ID Tamu</td>
                        <td>: <input type="text" name="id_tamu" id="id_tamu" readonly value="<?= $data["id_tamu"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <input type="text" name="nama_tamu" id="nama_tamu" required value="<?= $data["nama_tamu"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: 
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki"
                            <?php if ($data["jenis_kelamin"] == 'Laki-laki') echo 'checked="checked"'; ?>>
                            Laki-laki
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan"
                            <?php if ($data["jenis_kelamin"] == 'Perempuan') echo 'checked="checked"'; ?>>
                            Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Kontak</td>
                        <td>: <input type="text" name="kontak_tamu" id="kontak_tamu" value="<?= $data["kontak_tamu"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <input type="email" name="email_tamu" id="email_tamu" value="<?= $data["email_tamu"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <input type="date" name="tanggal" id="tanggal" required value="<?= $data["tanggal"]; ?>" /></td>
                    </tr>
                </table>
                <button type="submit" name="submit">Edit Data</button>
            </form>
            <?php 
        }
    } else {
        // Handle jika data tamu tidak ditemukan
        echo "Data tamu tidak ditemukan.";
    }
} else {
    // Handle jika parameter 'id' tidak tersedia dalam URL
    echo "ID tamu tidak valid.";
}

// Jika submit ditekan maka proses update data dilakukan
if (isset($_POST['submit'])) {
    $id = $_POST['id_tamu'];
    $nama = $_POST['nama_tamu'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kontak = $_POST['kontak_tamu'];
    $email = $_POST['email_tamu'];
    $tanggal = $_POST['tanggal'];

    // Update data
    mysqli_query($conn, "UPDATE tamu SET
    nama_tamu='$nama', jenis_kelamin='$jenis_kelamin',
    kontak_tamu='$kontak', email_tamu='$email', tanggal='$tanggal'
    WHERE id_tamu='$id'");

    // Kembali ke halaman index
    header("Location: indexTamu.php");
}
?>
