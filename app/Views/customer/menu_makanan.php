<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="layanan-wrapper">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="font-weight-bold">Menu <span class="text-gradient">Cemilan</span></h2>
                <p class="text-muted">Teman setia mabar kamu.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card card-layanan h-100 border-0">
                    <img src="public\images\indomie.jpg" class="card-img-top menu-img" alt="Menu" style="border-radius: 20px 20px 0 0;">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-white mb-2">Indomie Goreng + Telur</h5>
                        <h6 class="text-primary font-weight-bold mb-3">Rp 10.000</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge badge-success">Tersedia</span>
                            <small class="text-muted">Stok: 50</small>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
<?= $this->endSection(); ?>