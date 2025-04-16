<html>
<body>

<form action="" method="POST">
Nama: 1 <input type="text" name="nama1"><br>
Nama: 2 <input type="text" name="nama2"><br>
Nama: 3 <input type="text" name="nama3"><br>
<input type="submit" name="submit" value="Urutkan">
</form>

<?php
if (isset($_POST['submit'])) {
    $a = $_POST['nama1'];
    $b = $_POST['nama2'];
    $c = $_POST['nama3'];

    $hasil = [];

    if ($a <= $b && $a <= $c) {
        $hasil[] = $a;
        if ($b <= $c) {
            $hasil[] = $b;
            $hasil[] = $c;
        } else {
            $hasil[] = $c;
            $hasil[] = $b;
        }
    } elseif ($b <= $a && $b <= $c) {
        $hasil[] = $b;
        if ($a <= $c) {
            $hasil[] = $a;
            $hasil[] = $c;
        } else {
            $hasil[] = $c;
            $hasil[] = $a;
        }
    } else {
        $hasil[] = $c;
        if ($a <= $b) {
            $hasil[] = $a;
            $hasil[] = $b;
        } else {
            $hasil[] = $b;
            $hasil[] = $a;
        }
    }

    echo "<b>Output</b><br>";
    foreach ($hasil as $nama) {
        echo "$nama<br>";
    }
}
?>
</body>
</html>
