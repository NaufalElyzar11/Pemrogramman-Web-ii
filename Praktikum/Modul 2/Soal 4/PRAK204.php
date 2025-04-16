<html>
<body>

<form action="" method="POST">
Nilai : <input type="number" name="nilai"><br>
<input type="submit" name="submit" value="konversi">
</form>

<?php
if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];

    if ($nilai == 0) {
       echo '<span style="font-weight: bold;"> Nol';
    } 
    elseif ($nilai > 0 && $nilai < 10){
        echo '<span style="font-weight: bold;"> Satuan';
    }
    elseif ($nilai > 9 && $nilai <100) {
        echo '<span style="font-weight: bold;"> Puluhan';
    }
    elseif ($nilai > 99 && $nilai < 1000) {
        echo '<span style="font-weight: bold;"> Ratusan';
    }
    else{
        echo '<span style="font-weight: bold;"> Anda Menginput Melebihi Limit Bilangan';
    }
}
?>
</body>
</html>
