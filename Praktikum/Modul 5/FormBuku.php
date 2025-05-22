<?php
require_once 'Model.php';

$judul_buku = $penulis = $penerbit = $tahun_terbit = "";
$editMode = false;

if (isset($_GET['id'])) {
    $editMode = true;
    $id = $_GET['id'];
    $buku = getBukuById($id);
    if ($buku) {
        $judul_buku = $buku['judul_buku'];
        $penulis = $buku['penulis'];
        $penerbit = $buku['penerbit'];
        $tahun_terbit = $buku['tahun_terbit'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_buku = $_POST['judul_buku'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $penerbit = $_POST['penerbit'] ?? '';
    $tahun_terbit = $_POST['tahun_terbit'] ?? '';

    if ($editMode) {
        $id = $_POST['id_buku'];
        if (updateBuku($id, $judul_buku, $penulis, $penerbit, $tahun_terbit)) {
            header("Location: Buku.php");
            exit;
        } else {
            $error = "Gagal update data buku";
        }
    } else {
        if (insertBuku($judul_buku, $penulis, $penerbit, $tahun_terbit)) {
            header("Location: Buku.php");
            exit;
        } else {
            $error = "Gagal tambah data buku";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $editMode ? 'Edit' : 'Tambah' ?> Buku</title>
</head>
<body>
    <h1><?= $editMode ? 'Edit' : 'Tambah' ?> Buku</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <?php if ($editMode): ?>
            <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id) ?>">
        <?php endif; ?>

        <label>Judul Buku:</label><br>
        <input type="text" name="judul_buku" value="<?= htmlspecialchars($judul_buku) ?>" required><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="<?= htmlspecialchars($penulis) ?>" required><br><br>

        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" value="<?= htmlspecialchars($penerbit) ?>" required><br><br>

        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun_terbit" value="<?= htmlspecialchars($tahun_terbit) ?>" required><br><br>

        <button type="submit"><?= $editMode ? 'Update' : 'Simpan' ?></button>
    </form>

    <p><a href="Buku.php">Kembali ke Daftar Buku</a></p>
</body>
</html>
