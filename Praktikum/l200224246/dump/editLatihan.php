<?php
$conn = mysqli_connect('localhost','root','','perbankan');

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_nasabah'];
    $alamat = $_POST['alamat_nasabah'];

    //tammbah
    mysqli_query($conn, "UPDATE nasabah set nama_nasabah = '$nama', 
    alamat_nasabah = '$alamat' WHERE id_nasabah='$id'");
    header('location: latihan.php');}?>
<?php
    $id = $_GET["id_nasabah"];
    $query = mysqli_query($conn, "SELECT * FROM nasabah where id_nasabah='$id'");
    while($data = mysqli_fetch_array($query)){?>
        <form action="editLatihan.php" method></form>
    }
}
?>