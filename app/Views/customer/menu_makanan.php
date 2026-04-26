<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .menu-wrapper {
        padding-top: 140px;
        padding-bottom: 80px;
        min-height: 100vh;
        background-color: #0b1120;
    }

    .text-gradient {
        background: linear-gradient(90deg, #00d1ff, #007bff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .card-menu {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .card-menu:hover {
        transform: translateY(-8px);
        border-color: #00d1ff;
        box-shadow: 0 10px 20px rgba(0, 209, 255, 0.1);
    }

    .img-container {
        position: relative;
        height: 180px;
        background: #1a2234;
        overflow: hidden;
    }

    .menu-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-menu:hover .menu-img {
        transform: scale(1.1);
    }

    .badge-stok {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
        color: #fff;
        padding: 4px 12px;
        border-radius: 10px;
        font-size: 0.75rem;
        z-index: 2;
    }
</style>

<div class="menu-wrapper">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col text-center">
                <h2 class="display-4 font-weight-bold text-white mb-2">
                    Menu <span class="text-gradient">Cemilan</span>
                </h2>
                <p class="text-muted">Daftar kudapan dan minuman favorit untuk menemani sesi mabar kamu.</p>
                <div style="width: 50px; height: 3px; background: #00d1ff; margin: 15px auto; border-radius: 10px;"></div>
            </div>
        </div>

        <div class="row">
            <?php if (!empty($menu)) : ?>
                <?php foreach ($menu as $m) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-menu h-100 shadow">
                        <div class="img-container">
                            <img src="<?= $m['gambar_url']; ?>" class="menu-img" alt="<?= $m['nama_menu']; ?>">
                            <div class="badge-stok">Stok: <?= $m['stok']; ?></div>
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-2">
                                <?php if ($m['stok'] > 0) : ?>
                                    <span class="badge badge-pill badge-success mb-2" style="font-size: 10px;">Tersedia</span>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-danger mb-2" style="font-size: 10px;">Habis</span>
                                <?php endif; ?>
                                <h5 class="font-weight-bold text-white mb-1"><?= $m['nama_menu']; ?></h5>
                            </div>
                            
                            <div class="mt-auto pt-3 border-top border-secondary">
                                <h4 class="text-gradient font-weight-bold mb-0">Rp <?= number_format($m['harga'], 0, ',', '.'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Maaf, menu belum tersedia saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>