<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>control structure</title>
</head>
<body>
<H1>Value</H1>
<form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    <p>Value: <input type="text" name="value" size="20"></p>
    <p><input type="submit" value="Submit" name="submit"></p>
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['value'];
    $submit = $_POST['submit'];

    if ($submit) {
        if ($value == '') {
            $huruf = '"Value is empty or not filled"';
        } elseif ($value <= 20) {
            $grade = 'E';
        } elseif ($value <= 40) {
            $grade = 'D';
        } elseif ($value <= 60) {
            $grade = 'C';
        } elseif ($value <= 80) {
            $grade = 'B';
        } elseif ($value <= 100) {
            $grade = 'A';
        } else {
            $huruf = '"The entered value is wrong"';
        }

        echo "Number value is $value</br>";
        echo "Then the grade value is $grade";
    }
}
?>

</body>
</html>