<!DOCTYPE html>
<html lang="en">
<body> 
    <form action="" method="post">
        Tinggi: <input type="number" name="tinggi"><br>
        Alamat Gambar: <input type="text" name="alamat"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
        if (isset($_POST["submit"])) {
            $tinggi = $_POST["tinggi"];
            $alamat = $_POST["alamat"];

            if (is_numeric($tinggi) && $tinggi > 0 && !empty($alamat)) {
                $i = $tinggi;
                while ($i > 0) {
                    $spasi = $tinggi - $i;
                        $k = 0;
                    while ($k < $spasi) {
                        echo "<span style='display:inline-block; width: 50px;'></span>";
                        $k++;
                    }

                    $j = 1;
                    while ($j <= $i) {
                        echo '<img src="' . htmlspecialchars($alamat) . '" width="50" height="50">';
                        $j++;
                    }

                    echo "<br>";
                    $i--;
                }
            } else {
                echo "Masukkan tinggi yang valid dan alamat gambar yang tidak kosong.";
            }
        }
    ?>
</body>
</html>