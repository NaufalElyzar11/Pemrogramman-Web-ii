<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <a href="<?= base_url('/') ?>">Beranda</a>
            <a href="<?= base_url('/profil') ?>">Profil</a>
        </nav>

        <h1>My Profil Saya</h1>

        <div class="profile-info">
            <div class="info-section">
                <h2>Informasi Pribadi</h2>
                <p><strong>Nama Lengkap:</strong> <?= esc($my['nama']) ?></p>
                <p><strong>NIM:</strong> <?= esc($my['nim']) ?></p>
                <p><strong>Program Studi:</strong> <?= esc($my['asal_prodi']) ?></p>
                
                <?php if(!empty($my['gambar'])): ?>
                    <img src="<?= base_url('images/' . $my['gambar']) ?>" alt="Foto Profil" width="150">
                <?php endif; ?>
            </div>

            <div class="info-section">
                <h2>Hobi</h2>
                <div class="hobby-list">
                    <?php foreach($my['hobi'] as $hobi): ?>
                        <span class="hobby-item"><?= esc($hobi) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="info-section">
                <h2>Skill</h2>
                <div class="skill-list">
                    <?php foreach($my['skill'] as $skill): ?>
                        <span class="skill-item"><?= esc($skill) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if(!empty($my['informasi_lain'])): ?>
                <div class="info-section">
                    <h2>Informasi Lain</h2>
                    <p><?= esc($my['Valo']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
