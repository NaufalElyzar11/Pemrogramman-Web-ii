<?php
require_once 'Model.php';

$members = getAllMember();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if(deleteMember($id)) {
        header("Location: Member.php");
        exit;
    } else {
        echo "<p>Gagal menghapus data.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Member</title>
</head>
<body>
    <h1>Daftar Member</h1>
    <a href="FormMember.php">Tambah Member</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tgl Mendaftar</th>
                <th>Tgl Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= htmlspecialchars($member['id_member']) ?></td>
                <td><?= htmlspecialchars($member['nama_member']) ?></td>
                <td><?= htmlspecialchars($member['nomor_member']) ?></td>
                <td><?= htmlspecialchars($member['alamat']) ?></td>
                <td><?= htmlspecialchars($member['tgl_mendaftar']) ?></td>
                <td><?= htmlspecialchars($member['tgl_terakhir_bayar']) ?></td>
                <td>
                    <a href="FormMember.php?id=<?= $member['id_member'] ?>">Edit</a> |
                    <a href="Member.php?hapus=<?= $member['id_member'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
