<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <div class="text-center">
                        <h3 class="font-weight-bold text-primary mb-0">RafOzone</h3>
                        <p class="text-muted small">Sistem Booking Rental PS</p>
                        <hr>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <small class="text-muted d-block">Nomor Invoice</small>
                            <span class="font-weight-bold text-uppercase"><?= $invoice_no; ?></span>
                        </div>
                        <div class="col-6 text-right">
                            <small class="text-muted d-block">Tanggal</small>
                            <span class="font-weight-bold"><?= date('d/m/Y'); ?></span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-weight-bold border-bottom pb-2">Detail Pesanan</h6>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td>Jenis PS</td>
                                <td class="text-right font-weight-bold"><?= $jenis_ps; ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Mulai</td>
                                <td class="text-right"><?= date('H:i', strtotime($waktu_mulai)); ?> WIB</td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td class="text-right"><?= $durasi; ?> Jam</td>
                            </tr>
                        </table>
                    </div>

                    <div class="bg-primary text-white p-3 rounded mb-4 text-center">
                        <p class="mb-0 small">Total Pembayaran</p>
                        <h3 class="mb-0 font-weight-bold">Rp <?= number_format($total, 0, ',', '.'); ?></h3>
                    </div>

                    <div class="text-center mb-4">
                        <p class="text-muted small mb-2">Scan QRIS untuk membayar:</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=RafOzone-<?= $total; ?>" alt="QRIS" class="img-thumbnail" style="width: 180px;">
                        <p class="mt-2 font-weight-bold text-danger">⚠️ Simulasi Pembayaran</p>
                    </div>

                    <div class="no-print">
                        <button onclick="window.print()" class="btn btn-secondary btn-block mb-2">Cetak Struk (PDF)</button>
                        <a href="/layanan" class="btn btn-outline-primary btn-block">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
            
            <p class="text-center mt-4 text-muted small">Terima kasih telah bermain di RafOzone!</p>
        </div>
    </div>
</div>

<style>
    body { background-color: #f4f7f6; }
    .card { border-radius: 15px; }
    
    /* CSS agar saat diprint tombolnya hilang */
    @media print {
        .no-print, nav, footer {
            display: none !important;
        }
        body { background-color: white; }
        .container { width: 100%; max-width: 100%; margin: 0; padding: 0; }
        .card { box-shadow: none !important; border: none !important; }
    }
</style>
<?= $this->endSection(); ?>