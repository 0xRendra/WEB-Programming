<!DOCTYPE html>
<html>
<head>
    <title>Fungsi Matematika</title>
</head>
<body>
    <h1>Fungsi Matematika</h1>

    <?php
    $a = 10;
    $b = 5;

    // pow() digunakan untuk menghitung pangkat
    echo "Hasil dari $a pangkat $b adalah: " . pow($a, $b) . "<br>";

    // log() digunakan untuk menghitung logaritma
    echo "Logaritma natural dari $a adalah: " . log($a) . "<br>";

    // pi() digunakan untuk mendapatkan nilai pi
    echo "Nilai pi: " . pi() . "<br>";

    // rand() digunakan untuk menghasilkan angka acak
    echo "Angka acak antara 1 dan 100: " . rand(1, 100) . "<br>";

    // max() dan min() digunakan untuk mendapatkan nilai maksimum dan minimum
    echo "Nilai maksimum antara $a dan $b adalah: " . max($a, $b) . "<br>";
    echo "Nilai minimum antara $a dan $b adalah: " . min($a, $b) . "<br>";

    // floor(), ceil(), dan round() digunakan untuk membulatkan angka
    $c = 3.6;
    echo "Hasil pembulatan ke bawah dari $c adalah: " . floor($c) . "<br>";
    echo "Hasil pembulatan ke atas dari $c adalah: " . ceil($c) . "<br>";
    echo "Hasil pembulatan terdekat dari $c adalah: " . round($c) . "<br>";

    // sin(), cos(), dan tan() digunakan untuk menghitung fungsi trigonometri
    $sudut = 45;
    echo "Sinus dari $sudut derajat adalah: " . sin(deg2rad($sudut)) . "<br>";
    echo "Cosinus dari $sudut derajat adalah: " . cos(deg2rad($sudut)) . "<br>";
    echo "Tangen dari $sudut derajat adalah: " . tan(deg2rad($sudut)) . "<br>";
    ?>

</body>
</html>