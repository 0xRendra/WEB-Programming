<!DOCTYPE html>
<html>
<head>
    <title>Fungsi Utility</title>
</head>
<body>
    <h1>Fungsi Utility</h1>

    <?php
    $array = array("apple", "banana", "cherry", "date");
    $var = null;

    // count() digunakan untuk menghitung jumlah elemen dalam array atau objek
    echo "Jumlah elemen dalam array: " . count($array) . "<br>";

    // isset() digunakan untuk memeriksa apakah variabel telah diinisialisasi dan tidak null
    echo "Apakah variabel \$var telah diinisialisasi? ";
    if (isset($var)) {
        echo "Ya";
    } else {
        echo "Tidak";
    }
    echo "<br>";

    // empty() digunakan untuk memeriksa apakah variabel kosong (null, false, 0, string kosong, atau array kosong)
    echo "Apakah variabel \$var kosong? ";
    if (empty($var)) {
        echo "Ya";
    } else {
        echo "Tidak";
    }
    echo "<br>";
    ?>

</body>
</html>