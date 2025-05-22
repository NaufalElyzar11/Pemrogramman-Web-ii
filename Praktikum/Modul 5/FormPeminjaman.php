<?php
require_once 'Model.php';

$tgl_pinjam = $tgl_kembali = "";
$id_member = $id_buku = "";
$editMode = false;

$members = getAllMember();
$bukuList = getAllBuku();

if (isset($_GET['id'])) {
    $editMode = true;
    $id = $_GET['id'];
    $peminjaman = getPeminjamanById($id);
    if ($peminjaman) {
        $tgl_pinjam = $peminjaman['tgl_pinjam'];
        $tgl_kembali = $peminjaman['tgl_kembali'];
        $id_member = $peminjaman['id_member'];
        $id_buku = $peminjaman['id_buku'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
    $tgl_kembali = $_POST['tgl_kembali'] ?? '';
    $id_member = $_POST['id_member'] ?? '';
    $id_buku = $_POST['id_buku'] ?? '';

    if ($editMode) {
        $id = $_POST['id_peminjaman'];
        if (updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali)) {
            header("Location: Peminjaman.php");
            exit;
        } else {
            $error = "Gagal update data peminjaman";
        }
    } else {
        if (insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali)) {
            header("Location: Peminjaman.php");
            exit;
        } else {
            $error = "Gagal tambah data peminjaman";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $editMode ? 'Edit' : 'Tambah' ?> Peminjaman</title>
</head>
<body>
    <h1><?= $editMode ? 'Edit' : 'Tambah' ?> Peminjaman</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <?php if ($editMode): ?>
            <input type="hidden" name="id_peminjaman" value="<?= htmlspecialchars($id) ?>">
        <?php endif; ?>

        <label>Member:</label><br>
        <select name="id_member" required>
            <option value="">-- Pilih Member --</option>
            <?php foreach ($members as $member): ?>
                <option value="<?= $member['id_member'] ?>" <?= ($member['id_member'] == $id_member) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($member['nama_member']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Buku:</label><br>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($bukuList as $buku): ?>
                <option value="<?= $buku['id_buku'] ?>" <?= ($buku['id_buku'] == $id_buku) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($buku['judul_buku']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Tanggal Pinjam:</label><br>
        <input type="date" name="tgl_pinjam" value="<?= htmlspecialchars($tgl_pinjam) ?>" required><br><br>

        <label>Tanggal Kembali:</label><br>
        <input type="date" name="tgl_kembali" value="<?= htmlspecialchars($tgl_kembali) ?>" required><br><br>

        <button type="submit"><?= $editMode ? 'Update' : 'Simpan' ?></button>
    </form>

    <p><a href="Peminjaman.php">Kembali ke Daftar Peminjaman</a></p>
</body>
</html>
