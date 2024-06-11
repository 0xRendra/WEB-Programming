<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbankan</title>
    <?php 
        $conn = mysqli_connect('localhost','root','','perbankan');
    ?>
</head>
<body>
    <h3 align='center'><b>mencoba membuat view dari database Perbankan</b></h3>
    <table border="1" align='center'>
        <a href="tambahLatihan.php">tambah data</a>
    <tr>
        <th>ID Nasabah</th>
        <th>Nama Nasabah</th>
        <th>Alamat Nasabah</th>
        <th>Ubah</th>
    </tr>
    
<?php
    $query = mysqli_query($conn, "SELECT * FROM nasabah ORDER BY id_nasabah");

    while($data = mysqli_fetch_row($query)){
        echo "
        <tr>
        <td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td>
            <a href='editLatihan.php?id=".$data[0]."'>Edit</a> | 
            <a href='hapusLatihan.php?id=".$data[0]."'>Hapus</a>
        </td>
        </tr>";
    }
?>
</table>
</body>
</html>