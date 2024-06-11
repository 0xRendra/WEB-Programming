<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Data Pegawai</title>
</head>
<body>
    <h1>Tambah Data Pegawai</h1>
    <form action="tambahpegawai.php" enctype="multipart/form-data" method="post">
        <table width="50%" border="0">
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" id="nama" required /></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>: <input type="text" name="divisi" id="divisi"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>: <input type="file" name="gambar" id="gambar"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $gambar = upload();

    if ($gambar) {
        $query = mysqli_query($conn, "INSERT INTO pegawai (nama, divisi, gambar) VALUES ('$nama', '$divisi', '$gambar')");

        if ($query) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'pegawai.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
                document.location.href = 'pegawai.php';
            </script>";
        }
    }
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('Gambar belum diupload');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Ekstensi gambar yang diperbolehkan adalah jpeg, jpg, png');
        </script>";
        return false;
    }

    // cek jika ukuran file terlalu besar
    if ($ukuranFile > 500000) {
        echo "<script>
            alert('Gambar melebihi ukuran yang diperbolehkan');
        </script>";
        return false;
    }

    // lolos pengecekan, file siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // pastikan direktori 'photo' ada dan bisa ditulisi
    if (!is_dir('photo')) {
        mkdir('photo', 0777, true);
    }

    // pindahkan file ke folder 'photo'
    if (move_uploaded_file($tmpName, 'photo/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "<script>
            alert('Gagal mengupload gambar');
        </script>";
        return false;
    }
}
?>
