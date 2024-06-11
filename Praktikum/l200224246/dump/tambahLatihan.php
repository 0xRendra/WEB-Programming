<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nasabah</title>
</head>
<body>
    <h1>tambah data</h1>
    <form action="tambahLatihan.php" method="post">
    <table>
        <tr>
            <td>id nasabah</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>nama nasabah</td>
            <td><input type="text" name="nama_nasabah" ></td>
        </tr>
        <tr>
            <td>alamat nasabah</td>
            <td><input type="text" name="alamat_nasabah"></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="masukan">
    </form>
    
    <?php 
    $conn = mysqli_connect('localhost','root','','perbankan');
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama_nasabah'];
        $alamat = $_POST['alamat_nasabah'];

        //tammbah
        mysqli_query($conn, "INSERT INTO nasabah(id_nasabah,nama_nasabah,alamat_nasabah) VALUES('$id','$nama','$alamat')");
        header('location: latihan.php');
    }
    ?>
</body>
</html>