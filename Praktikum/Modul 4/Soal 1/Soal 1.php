<!DOCTYPE html>
<html>
<head>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
            width: 200px;
            height: 50px;
        }
    </style>
</head>
<body>

<form method="post">
    Panjang : <input type="number" name="panjang" required><br><br>
    Lebar : <input type="number" name="lebar" required><br><br>
    Nilai : <input type="text" name="nilai" required style="width:300px;"><br><br>
    <input type="submit" name="submit" value="Cetak">
</form>

<?php
if (isset($_POST['submit'])) {
    $panjang = (int) $_POST['panjang'];
    $lebar = (int) $_POST['lebar'];
    $nilaiInput = trim($_POST['nilai']);
    
    $nilaiArray = explode(' ', $nilaiInput);
    $totalKotak = $panjang * $lebar;

    if (count($nilaiArray) > $totalKotak) {
        echo "<p>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
    } else {
        echo "<br>";
        echo "<table>";
        $index = 0;

        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                if ($index < count($nilaiArray)) {
                    echo "<td>" . htmlspecialchars($nilaiArray[$index]) . "</td>";
                    $index++;
                } else {
                    echo "<td></td>"; 
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>
