<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<?php
$nama = $nim = $gender = "";
$namaErr = $nimErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
        $namaErr = "nama jangan kosong";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    if (empty($_POST["nim"])) {
        $nimErr = "nim jangan kosong";
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "jenis kelamin jangan kosong";
    } else {
        $gender = htmlspecialchars($_POST["gender"]);
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nama: <input type="text" name="nama" value="<?php echo $nama;?>">
    <span class="error">* <?php echo $namaErr;?></span><br><br>

    NIM: <input type="number" name="nim" value="<?php echo $nim;?>">
    <span class="error">* <?php echo $nimErr;?></span><br><br>

    Jenis Kelamin :<span class="error">* <?php echo $genderErr;?></span><br>
    <input type="radio" name="gender" value="Laki-Laki" <?php if($gender=="Laki-Laki") echo "checked";?>> Laki-Laki<br>
    <input type="radio" name="gender" value="Perempuan" <?php if($gender=="Perempuan") echo "checked";?>> Perempuan<br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($nama && $nim && $gender) {
    echo "<h3>Hasil Input:</h3>";
    echo "Nama: $nama<br>";
    echo "NIM: $nim<br>";
    echo "Jenis Kelamin: $gender<br>";
}
?>

</body>
</html>
