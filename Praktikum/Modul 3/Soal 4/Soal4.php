<!DOCTYPE html>
<html lang="en">
<body>
<?php
session_start();

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    if (is_numeric($jumlah) && $jumlah > 0) {
        $_SESSION['jumlah'] = $jumlah;
    } else {
        echo "Masukkan jumlah yang valid.";
        unset($_SESSION['jumlah']); 
    }
}

if (isset($_POST['tambah'])) {
    $_SESSION['jumlah']++;
}
if (isset($_POST['kurang'])) {
    if ($_SESSION['jumlah'] > 1) {
        $_SESSION['jumlah']--;
    }
}

if (!isset($_SESSION['jumlah'])) {
?>
    <form method="post">
        Jumlah Bintang: <input type="number" name="jumlah" min="1" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
<?php
} else {

    echo "<p>Jumlah bintang: " . $_SESSION['jumlah'] . "</p>";

    for ($i = 0; $i < $_SESSION['jumlah']; $i++) {
        echo "<img src='bintang.png' width='50' height='50' style='margin:2px'>";
    }

    echo '<form method="post">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
          </form>';
}
?>
</body>
</html>
