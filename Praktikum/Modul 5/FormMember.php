<?php
require_once 'Model.php';

$nama_member = $nomor_member = $alamat = $tgl_mendaftar = $tgl_terakhir_bayar = "";
$editMode = false;

if (isset($_GET['id'])) {
    $editMode = true;
    $id_member = $_GET['id'];
    $member = getMemberById($id_member);
    if ($member) {
        $nama_member = $member['nama_member'];
        $nomor_member = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = $member['tgl_mendaftar'];
            tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_member = $_POST['nama_member'] ?? '';
    $nomor_member = $_POST['nomor_member'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $tgl_mendaftar = $_POST['tgl_mendaftar'] ?? '';
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'] ?? '';

    if ($editMode) {
        $id_member = $_POST['id_member'];
        if (updateMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)) {
            header("Location: Member.php");
            exit;
        } else {
            $error = "Gagal update data";
        }
    } else {
        if (insertMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)) {
            header("Location: Member.php");
            exit;
        } else {
            $error = "Gagal tambah data";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $editMode ? 'Edit' : 'Tambah' ?> Member</title>
</head>
<body>
    <h1><?= $editMode ? 'Edit' : 'Tambah' ?> Member</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <?php if ($editMode): ?>
            <input type="hidden" name="id_member" value="<?= htmlspecialchars($id_member) ?>">
        <?php endif; ?>

        <label>Nama:</label><br>
        <input type="text" name="nama_member" value="<?= htmlspecialchars($nama_member) ?>" required><br><br>

        <label>Nomor Member:</label><br>
        <input type="text" name="nomor_member" value="<?= htmlspecialchars($nomor_member) ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= htmlspecialchars($alamat) ?></textarea><br><br>

        <label>Tanggal Mendaftar:</label><br>
        <input type="datetime-local" name="tgl_mendaftar" value="<?= $tgl_mendaftar ? date('Y-m-d\TH:i', strtotime($tgl_mendaftar)) : '' ?>" required><br><br>

        <label>Tanggal Terakhir Bayar:</label><br>
        <input type="date" name="tgl_terakhir_bayar" value="<?= htmlspecialchars($tgl_terakhir_bayar) ?>" required><br><br>

        <button type="submit"><?= $editMode ? 'Update' : 'Simpan' ?></button>
    </form>

    <p><a href="Member.php">Kembali ke Daftar Member</a></p>
</body>
</html>
