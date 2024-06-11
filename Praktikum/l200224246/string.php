<!DOCTYPE html>
<html>
<head>
    <title>Fungsi String</title>
</head>
<body>
    <h1>Fungsi String</h1>

    <?php
    $string = "Hello, World!";

    // strlen() digunakan untuk mendapatkan panjang string
    echo "Panjang string: " . strlen($string) . "<br>";

    // strcmp() digunakan untuk membandingkan dua string
    $string2 = "Hello, World!";
    echo "Hasil perbandingan string '$string' dan '$string2': " . strcmp($string, $string2) . "<br>";

    // strstr() digunakan untuk mencari substring dalam string
    echo "Substring 'World' ditemukan pada posisi: " . strstr($string, "World") . "<br>";

    // implode() digunakan untuk menggabungkan elemen array menjadi string
    $arr = array("Hello", "World", "PHP");
    echo "Array digabungkan menjadi string: " . implode(", ", $arr) . "<br>";

    // explode() digunakan untuk memecah string menjadi array
    $string = "Hello,World,PHP";
    $arr = explode(",", $string);
    echo "String dipecah menjadi array: ";
    print_r($arr);
    echo "<br>";
    ?>

</body>
</html>