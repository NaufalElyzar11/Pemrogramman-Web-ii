<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <a href="<?= base_url('/') ?>">Beranda</a>
            <a href="<?= base_url('/profil') ?>">Profil</a>
        </nav>

        <h1>Selamat datang di My Web Saya</h1>
        
        <div class="info-section">
            <h2>Informasi Mahasiswa</h2>
            <p><strong>Nama:</strong> <?= esc($nama) ?></p>
            <p><strong>NIM:</strong> <?= esc($nim) ?></p>
        </div>
    </div>
</body>
</html>
