<?php
    $conn = mysqli_connect('localhost','root','','perbankan');
    $id = $_GET["id_nasabah"];
    $query = mysqli_query($conn, "DELETE FROM nasabah WHERE id_nasabah='$id'");
    header("Location: latihan.php");
?>