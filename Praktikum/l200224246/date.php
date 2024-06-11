<!DOCTYPE html>
<html>
<head>
    <title>Fungsi Date</title>
</head>
<body>
    <h1>Fungsi Date</h1>

    <?php
    // date() digunakan untuk mendapatkan tanggal dan waktu saat ini
    echo "Tanggal dan waktu saat ini: " . date("Y-m-d H:i:s") . "<br>";

    // mktime() digunakan untuk mendapatkan timestamp Unix dari tanggal yang diberikan
    $timestamp = mktime(0, 0, 0, 3, 28, 2023);
    echo "Timestamp Unix dari tanggal 28 Maret 2023: " . $timestamp . "<br>";

    // time() digunakan untuk mendapatkan waktu saat ini dalam format timestamp Unix
    echo "Waktu saat ini dalam format timestamp Unix: " . time() . "<br>";

    // strtotime() digunakan untuk mengonversi string tanggal menjadi timestamp Unix
    $timestamp = strtotime("2023-03-28");
    echo "Timestamp Unix dari tanggal 28 Maret 2023 (dari string): " . $timestamp . "<br>";
    ?>

</body>
</html>