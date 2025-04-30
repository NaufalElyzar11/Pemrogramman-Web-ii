<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }

        th {
            background-color: gray;
        }
    </style>
</head>
<body>

<?php
$data = [
    [
        'nama' => 'Andi',
        'nim' => '2101001',
        'uts' => 87,
        'uas' => 65
    ],
    [
        'nama' => 'Budi',
        'nim' => '2101002',
        'uts' => 76,
        'uas' => 79
    ],
    [
        'nama' => 'Tono',
        'nim' => '2101003',
        'uts' => 50,
        'uas' => 41
    ],
    [
        'nama' => 'Jessica',
        'nim' => '2101004',
        'uts' => 60,
        'uas' => 75
    ]
];

foreach ($data as $key => $mahasiswa) {
    $nilaiAkhir = (0.4 * $mahasiswa['uts']) + (0.6 * $mahasiswa['uas']);
    

    if ($nilaiAkhir >= 80) {
        $huruf = 'A';
    } elseif ($nilaiAkhir >= 70) {
        $huruf = 'B';
    } elseif ($nilaiAkhir >= 60) {
        $huruf = 'C';
    } elseif ($nilaiAkhir >= 50) {
        $huruf = 'D';
    } else {
        $huruf = 'E';
    }


    $data[$key]['nilai_akhir'] = round($nilaiAkhir, 1);
    $data[$key]['huruf'] = $huruf;
}

echo "<table>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
      </tr>";

foreach ($data as $mahasiswa) {
    echo "<tr>";
    echo "<td>{$mahasiswa['nama']}</td>";
    echo "<td>{$mahasiswa['nim']}</td>";
    echo "<td>{$mahasiswa['uts']}</td>";
    echo "<td>{$mahasiswa['uas']}</td>";
    echo "<td>{$mahasiswa['nilai_akhir']}</td>";
    echo "<td>{$mahasiswa['huruf']}</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
