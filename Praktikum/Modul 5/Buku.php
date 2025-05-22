<?php
require_once 'Model.php';

$bukuList = getAllBuku();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if(deleteBuku($id)) {
        header("Location: Buku.php");
        exit;
    } else {
        echo "<p>Gagal menghapus data buku.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="FormBuku.php">Tambah Buku</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bukuList as $buku): ?>
            <tr>
                <td><?= htmlspecialchars($buku['id_buku']) ?></td>
                <td><?= htmlspecialchars($buku['judul_buku']) ?></td>
                <td><?= htmlspecialchars($buku['penulis']) ?></td>
                <td><?= htmlspecialchars($buku['penerbit']) ?></td>
                <td><?= htmlspecialchars($buku['tahun_terbit']) ?></td>
                <td>
                    <a href="FormBuku.php?id=<?= $buku['id_buku'] ?>">Edit</a> |
                    <a href="Buku.php?hapus=<?= $buku['id_buku'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
