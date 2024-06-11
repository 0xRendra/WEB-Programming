<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Latihan</title>
    <?php 
    $conn = mysqli_connect('localhost','root','','latihan')
    ?>
</head>
<body>
    <h1>ini untuk latihan</h1>
    <table border='0' width= '30%' align='center'>
        <form method ='POST' action='<?php echo $_SERVER['PHP_SELF'];?>'>
            <tr>
                <td width='25%'>NIM</td>
                <td width='5%'>:</td>
                <td width='65'><input type="text" name='nim' size="30" maxlength="50"></td></tr>
            <tr>
                <td width='25%'>Nama</td>
                <td width='5%'>:</td>
                <td width='65'><input type="text" name='nama' size="30" maxlength="50"></td></tr>
            <tr><td width='25%'>Kelas</td>
                <td width='5%'>:</td>
                <td width='65'>
                    <input type="radio" name='kelas' value="A">A
                    <input type="radio" name='kelas' value="B">B
                    <input type="radio" name='kelas' value="C">C</td></tr>
            <tr><td width='25%'>'NIM'</td>
                <td width='5%'>:</td>
                <td width='65'><input type="text" name='nim' size="30" maxlength="50"></td>
            </tr>
            
    
    </form>
    </table>

    <hr>
    <h3>data latihan</h3>
    <table border='1' width='50%' align='center'>
        <tr>
            <td align="center" width='15%'><b>id</b></td>
            <td align="center" width='15%'><b>id_latihan</b></td>
            <td align="center" width='70%'><b>Nama</b></td>
        </tr>
        <?php 
        $cari = "SELECT * FROM latihan ORDER BY id";
        $hasil_cari = mysqli_query($conn, $cari);
        while ($data = mysqli_fetch_row($hasil_cari)){
            echo "
            <tr>
            <td width='15%'>$data[0]</td>
            <td width='15%'>$data[1]</td>
            <td width='70%'>$data[2]</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>