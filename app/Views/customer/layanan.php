<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="layanan-wrapper"> <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <h2 class="font-weight-bold text-white">Daftar Layanan <span class="text-gradient">RafOzone</span></h2>
                <p class="text-muted">Pilih paket PlayStation favoritmu dan mulai bermain!</p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($layanan as $l) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan shadow-lg h-100 border-0">
                        <div class="card-body p-4">
                            <span class="badge badge-ps mb-3"><?= $l['jenis_ps']; ?></span>
                            
                            <h4 class="card-title font-weight-bold text-white mb-2"><?= $l['tipe_room']; ?></h4>
                            
                            <h5 class="text-success font-weight-bold mb-3">
                                Rp <?= number_format($l['harga_per_jam'], 0, ',', '.'); ?> <span class="small text-muted">/ Jam</span>
                            </h5>
                            
                            <div class="small mb-4">
                                <span class="text-muted">Status: </span>
                                <span class="badge <?= ($l['status_room'] == 'tersedia') ? 'badge-success' : 'badge-danger'; ?>">
                                    <?= strtoupper($l['status_room']); ?>
                                </span>
                            </div>

                            <a href="/booking/pesan/<?= $l['id_layanan']; ?>" class="btn btn-booking btn-block">
                                Booking Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>