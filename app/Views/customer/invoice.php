<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="invoice-page" style="padding-top: 120px; padding-bottom: 60px; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-4 p-md-5 bg-white text-dark">
                        
                        <div class="text-center mb-4">
                            <h3 class="font-weight-bold text-primary mb-0">RafOzone</h3>
                            <p class="text-muted small">Sistem Booking Rental PS</p>
                            <div style="border-top: 2px dashed #dee2e6; margin-top: 15px;"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase">Nomor Invoice</small>
                                <span class="font-weight-bold"><?= $invoice_no; ?></span>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted d-block text-uppercase">Tanggal</small>
                                <span class="font-weight-bold"><?= date('d/m/Y'); ?></span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="font-weight-bold text-primary border-bottom pb-2 mb-3">RINCIAN PESANAN</h6>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td class="text-muted">Jenis PS & Room</td>
                                    <td class="text-right font-weight-bold"><?= $jenis_ps; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Waktu Mulai</td>
                                    <td class="text-right font-weight-bold"><?= date('H:i', strtotime($waktu_mulai)); ?> WIB</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Durasi Bermain</td>
                                    <td class="text-right font-weight-bold"><?= $durasi; ?> Jam</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Menu Tambahan</td>
                                    <td class="text-right font-weight-bold text-success">
<?= !empty($nama_makanan) ? $nama_makanan : 'Tidak Ada'; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="rounded-lg p-3 text-center mb-4" style="background: linear-gradient(45deg, #007bff, #0056b3); color: white; box-shadow: 0 4px 15px rgba(0,123,255,0.3);">
                            <small class="text-uppercase" style="letter-spacing: 1px; opacity: 0.8;">Total Bayar</small>
                            <h2 class="font-weight-bold mb-0">Rp <?= number_format($total, 0, ',', '.'); ?></h2>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-muted small mb-3">Scan QRIS untuk Pembayaran Cepat</p>
                            <div class="d-inline-block p-2 bg-white border rounded shadow-sm">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=RafOzone-<?= $total; ?>" alt="QRIS" style="width: 160px;">
                            </div>
                    
                        </div>

                        <div class="no-print">
                            <a href="/" class="btn btn-outline-primary btn-block py-2">
                                <i class="fas fa-home mr-1"></i> Beranda
                            </a>
                        </div>

                    </div>
                </div>

                <p class="text-center mt-4 text-white-50 small" style="opacity: 0.6;">
                    RafOzone Gaming Center &copy; 2026
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Paksa Background Body tetap Gelap */
    body { 
        background-color: #0f172a !important; 
    }
    
    /* CSS Khusus Print */
    @media print {
        body { background-color: white !important; }
        .invoice-page { padding-top: 0 !important; }
        .no-print, nav, footer, .text-white-50 { display: none !important; }
        .card { box-shadow: none !important; border: none !important; }
        .container { width: 100% !important; max-width: 100% !important; }
    }
</style>
<?= $this->endSection(); ?>