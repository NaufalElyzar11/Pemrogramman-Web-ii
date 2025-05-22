<?php
require_once 'Model.php';

$peminjamanList = getAllPeminjaman();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if(deletePeminjaman($id)) {
        header("Location: Peminjaman.php");
        exit;
    } else {
        echo "<p>Gagal menghapus data peminjaman.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman</title>
</head>
<body>
    <h1>Daftar Peminjaman</h1>
    <a href="FormPeminjaman.php">Tambah Peminjaman</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjamanList as $peminjaman): ?>
            <tr>
                <td><?= htmlspecialchars($peminjaman['id_peminjaman']) ?></td>
                <td><?= htmlspecialchars($peminjaman['nama_member']) ?></td>
                <td><?= htmlspecialchars($peminjaman['judul_buku']) ?></td>
                <td><?= htmlspecialchars($peminjaman['tgl_pinjam']) ?></td>
                <td><?= htmlspecialchars($peminjaman['tgl_kembali']) ?></td>
                <td>
                    <a href="FormPeminjaman.php?id=<?= $peminjaman['id_peminjaman'] ?>">Edit</a> |
                    <a href="Peminjaman.php?hapus=<?= $peminjaman['id_peminjaman'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
