<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="text-center pt-5 pb-5" style="background: radial-gradient(circle at top right, rgba(0, 209, 255, 0.1), transparent);">
    <div class="container pt-5">
        <h1 class="display-4 font-weight-bold mb-4">
            LEVEL UP YOUR <span class="text-gradient text-glow">GAMING EXPERIENCE</span>
        </h1>
        
        <p class="text-muted mb-5 mx-auto" style="max-width: 700px; font-size: 1.1rem; line-height: 1.8;">
            Rasakan sensasi bermain PlayStation dengan fasilitas premium, <br>
            ruangan nyaman, dan game terbaru. Booking ruanganmu <br>
            sekarang tanpa perlu antre!
        </p>

        <div class="px-3">
            <a href="/layanan" class="btn-neon">
                BOOKING SEKARANG
            </a>
        </div>
    </div>
</section>

<div class="container pb-5 mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body text-center">
                    <i class="fas fa-bolt text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">Booking Instan</h5>
                    <p class="text-muted small">Pesan room pilihanmu dalam hitungan detik tanpa antre.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4" style="border: 1px solid var(--primary);">
                <div class="card-body text-center">
                    <i class="fas fa-vr-cardboard text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">Next-Gen PS5</h5>
                    <p class="text-muted small">Nikmati grafis memukau dengan console PlayStation 5 terbaru.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body text-center">
                    <i class="fas fa-qrcode text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">QRIS Payment</h5>
                    <p class="text-muted small">Pembayaran otomatis dan aman menggunakan QRIS.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>