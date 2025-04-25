<!DOCTYPE html>
<html>
<body>

    <form method="post">
        <label>Masukkan string:</label>
        <input type="text" name="inputString" required>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['inputString'];
        $length = strlen($input);
        $output = "";

        for ($i = 0; $i < $length; $i++) {
            $char = $input[$i];
            $output .= strtoupper($char) . str_repeat(strtolower($char), $length - 1);
        }

        echo "<h3>Input:</h3>";
        echo "<p>$input</p>";

        echo "<h3>Output:</h3>";
        echo "<p>$output</p>";
    }
    ?>
</body>
</html>
