<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fungsi Tanggal Waktu</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date("H:i:s A");
$waktu = date("d-m-Y");
$hari = date("l");
$tanggal = date("d");
$bulan = date("F");
$tahun = date("Y");

echo "Sekarang jam $jam</br>";
echo "Sekarang tanggal $waktu</br>";
echo "Lebih detailnya hari $hari Tanggal $tanggal bulan $bulan tahun $tahun";
?>
</body>
</html>