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
        .top-inner-box{
            text-align: center;
            font-size: 22px;
            border: 1px solid black;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: red;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$hp = array("brand" => array ("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"));
?>

<table>
    <tr>
        <th>
            <div class="top-inner-box">Daftar Smartphone Samsung</div>
        </th>
    </tr>
    <?php foreach ($hp["brand"] as $item): ?>
        <tr>
            <td>
                <div class="inner-box"><?php echo $item; ?></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
