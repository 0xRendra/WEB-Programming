<?php
$conn = mysqli_connect('localhost', 'root', '', 'informatika');

if (isset($_POST['submit'])) {
    $NIM = $_POST['NIM'];
    $Nama = $_POST['Nama'];
    $Kelas = $_POST['Kelas'];
    $Alamat = $_POST['Alamat'];

    $update = "UPDATE mahasiswa SET nama='$Nama', kelas='$Kelas', alamat='$Alamat' WHERE nim='$NIM'";
    mysqli_query($conn, $update);

    header("Location: form.php");
    exit();
}
?>