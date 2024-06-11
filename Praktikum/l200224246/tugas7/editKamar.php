<?php
// Melakukan koneksi ke database
include 'koneksi.php';

// Pastikan parameter 'id' tersedia dalam URL
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id !== null) {
    // Query untuk mengambil data tamu berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='$id'");

    // Pastikan data kamar tersedia
    if (mysqli_num_rows($query) > 0) {
        // Jika data tersedia maka akan ditampilkan
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <h1>Edit Data Kamar</h1>
            <form action="editKamar.php" method="post">
                <table>
                    <tr>
                        <td>ID Kamar</td>
                        <td>: <input type="text" name="id_kamar" id="id_kamar" readonly value="<?= $data["id_kamar"]; ?>" /></td>
                    </tr>
        
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: 
                            <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Ekonomis"
                            <?php if ($data["jenis_kamar"] == 'Ekonomis') echo 'checked="checked"'; ?>>
                            Ekonomis
                            <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Eksekutif"
                            <?php if ($data["jenis_kamar"] == 'Eksekutif') echo 'checked="checked"'; ?>>
                            Eksekutif
                            <input type="radio" name="jenis_kamar" id="jenis_kamar" value="VIP"
                            <?php if ($data["jenis_kamar"] == 'VIP') echo 'checked="checked"'; ?>>
                            VIP
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya</td>
                        <td>: <input type="text" name="biaya" id="biaya" value="<?= $data["biaya"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Fasilitas</td>
                        <td>: <input type="text" name="fasilitas" id="fasilitas" value="<?= $data["fasilitas"]; ?>" /></td>
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
    $id = $_POST['id_kamar'];
    $jenis_kamar = $_POST['jenis_kamar'];
    $biaya = $_POST['biaya'];
    $fasilitas = $_POST['fasilitas'];

    // Update data
    mysqli_query($conn, "UPDATE kamar SET
    jenis_kamar='$jenis_kamar', biaya='$biaya'
    , fasilitas='$fasilitas' WHERE id_kamar='$id'");

    // Kembali ke halaman index
    header("Location: indexKamar.php");
}
?>
