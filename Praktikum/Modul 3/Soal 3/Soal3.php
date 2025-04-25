<!DOCTYPE html>
<html lang="en">
<body> 
    <form action="" method="post">
        Batas Bawah: <input type="number" name="bawah" value="<?php echo isset($_POST['bawah']) ? htmlspecialchars($_POST['bawah']) : ''; ?>"><br>
        Batas Atas: <input type="number" name="atas" value="<?php echo isset($_POST['atas']) ? htmlspecialchars($_POST['atas']) : ''; ?>"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
        if (isset($_POST["submit"])) {
            $bawah = $_POST["bawah"];
            $atas = $_POST["atas"];

            if (is_numeric($bawah) && is_numeric($atas) && $bawah <= $atas) {
                $i = $bawah;
                echo "<div>";
                do {
                    if (($i + 7) % 5 == 0) {
                        echo "<img src='bintang.png' alt='bintang' width='20' height='20'> ";
                    } else {
                        echo "$i ";
                    }
                    $i++;
                } while ($i <= $atas);
                echo "</div>";
            } else {
                echo "Masukkan batas bawah dan batas atas yang valid (bawah <= atas).";
            }
        }
    ?>
</body>
</html>