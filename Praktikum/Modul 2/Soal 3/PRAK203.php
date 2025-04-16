<!DOCTYPE html>
<html>
<body>

<?php
$nilai = $dari = $ke = "";
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];
    $dari = $_POST["dari"];
    $ke = $_POST["ke"];

    if ($dari == $ke) {
        $hasil = $nilai;
    } else {
        switch ($dari) {
            case "Celcius": $celcius = $nilai; break;
            case "Fahrenheit": $celcius = ($nilai - 32) * 5/9; break;
            case "Rheamur": $celcius = $nilai * 5/4; break;
            case "Kelvin": $celcius = $nilai - 273.15; break;
        }

        switch ($ke) {
            case "Celcius": $hasil = $celcius; break;
            case "Fahrenheit": $hasil = ($celcius * 9/5) + 32; break;
            case "Rheamur": $hasil = $celcius * 4/5; break;
            case "Kelvin": $hasil = $celcius + 273.15; break;
        }
    }
}
?>

<form method="post" action="">
    Nilai: <input type="number" name="nilai" value="<?php echo $nilai; ?>"><br><br>

    Dari:<br>
    <input type="radio" name="dari" value="Celcius" <?php if ($dari=="Celcius") echo "checked"; ?>> Celcius<br>
    <input type="radio" name="dari" value="Fahrenheit" <?php if ($dari=="Fahrenheit") echo "checked"; ?>> Fahrenheit<br>
    <input type="radio" name="dari" value="Rheamur" <?php if ($dari=="Rheamur") echo "checked"; ?>> Rheamur<br>
    <input type="radio" name="dari" value="Kelvin" <?php if ($dari=="Kelvin") echo "checked"; ?>> Kelvin<br><br>

    Ke:<br>
    <input type="radio" name="ke" value="Celcius" <?php if ($ke=="Celcius") echo "checked"; ?>> Celcius<br>
    <input type="radio" name="ke" value="Fahrenheit" <?php if ($ke=="Fahrenheit") echo "checked"; ?>> Fahrenheit<br>
    <input type="radio" name="ke" value="Rheamur" <?php if ($ke=="Rheamur") echo "checked"; ?>> Rheamur<br>
    <input type="radio" name="ke" value="Kelvin" <?php if ($ke=="Kelvin") echo "checked"; ?>> Kelvin<br><br>

    <input type="submit" value="Konversi">
</form>

<?php
if ($hasil !== "") {
    $satuan = [
        "Celcius" => "°C",
        "Fahrenheit" => "°F",
        "Rheamur" => "°Re",
        "Kelvin" => "K"
    ];

    echo "<span style='font-weight: bold;'> Hasil Konversi: $nilai {$satuan[$dari]} = $hasil {$satuan[$ke]}";
}
?>

</body>
</html>
