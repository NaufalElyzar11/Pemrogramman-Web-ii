<!DOCTYPE html>
<html lang="en">
<body> 
    <form action="" method="post">
        Jumlah Peserta: <input type="text" name="peserta" value="<?php echo isset($_POST['peserta']) ? htmlspecialchars($_POST['peserta']) : ''; ?>"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
        if (isset($_POST["submit"])) {
            $jumlah = $_POST["peserta"];

            if (is_numeric($jumlah) && $jumlah > 0) {
                $i = 1;
                while ($i <= $jumlah) {
                    if ($i % 2 == 0) {
                        echo "<span style='color:green;'>Peserta ke-$i</span><br>";
                    } else {
                        echo "<span style='color:red;'>Peserta ke-$i</span><br>";
                    }
                    $i++;
                }
            } else {
                echo "Masukkan jumlah peserta yang valid.";
            }
        }
    ?>
</body>
</html>