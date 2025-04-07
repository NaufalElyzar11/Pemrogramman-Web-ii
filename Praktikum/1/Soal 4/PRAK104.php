<!DOCTYPE html>
<html>
<head>
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border-collapse: collapse;
            width: 300px;
        }       
        th, td {
            border: 1px solid black;
            padding: 4px;
        }
        .inner-box {
            border: 1px solid black;
            padding: 5px;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$hp = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
?>

<table>
    <tr>
        <th>
            <div class="inner-box">Daftar Smartphone Samsung</div>
        </th>
    </tr>
    <?php foreach ($hp as $item): ?>
        <tr>
            <td>
                <div class="inner-box"><?php echo $item; ?></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
