<style>
        th {
            background-color: gray;
        }
    </style>
<?php
$mahasiswa = [
    [
        "nama" => "Ridho",
        "matkul" => [
            ["nama" => "Pemrograman I", "sks" => 2],
            ["nama" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama" => "Arsitektur Komputer", "sks" => 3],
        ]
    ],
    [
        "nama" => "Ratna",
        "matkul" => [
            ["nama" => "Basis Data I", "sks" => 2],
            ["nama" => "Praktikum Basis Data I", "sks" => 1],
            ["nama" => "Kalkulus", "sks" => 3],
        ]
    ],
    [
        "nama" => "Tono",
        "matkul" => [
            ["nama" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama" => "Komputasi Awan", "sks" => 3],
            ["nama" => "Kecerdasan Bisnis", "sks" => 3],
        ]
    ],
];
foreach ($mahasiswa as $index => $mhs) {
    $total_sks = 0;
    foreach ($mhs['matkul'] as $matkul) {
        $total_sks += $matkul['sks'];
    }
    $mahasiswa[$index]['total_sks'] = $total_sks;
    $mahasiswa[$index]['keterangan'] = ($total_sks < 7) ? "Revisi KRS" : "Tidak Revisi";
}
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>";

$no = 1;
foreach ($mahasiswa as $mhs) {
    $matkul = $mhs['matkul'];
    $total = $mhs['total_sks'];
    $ket = $mhs['keterangan'];
    $color = ($ket == "Revisi KRS") ? "red" : "green";

    foreach ($matkul as $index => $mk) {
        echo "<tr>";
        if ($index == 0) {
            echo "<td>{$no}</td>";
            echo "<td>{$mhs['nama']}</td>";
        } else {
            echo "<td></td><td></td>";
        }
        echo "<td>{$mk['nama']}</td>";
        echo "<td>{$mk['sks']}</td>";
        if ($index == 0) {
            echo "<td>{$total}</td>";
            echo "<td style='background-color:{$color}'>{$ket}</td>";
        } else {
            echo "<td></td><td></td>";
        }
        echo "</tr>";
    }
    $no++;
}
echo "</table>";
?>
