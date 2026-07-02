<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <!-- HEADER PROMO -->
    <div class="mb-4">
        <div class="p-4 text-white shadow-sm"
             style="border-radius:15px; background:linear-gradient(90deg,#ff416c,#ff4b2b);">
            <h4 class="font-weight-bold mb-1">
                <i class="fas fa-percentage mr-2"></i>
                Daftar Layanan Special Promo
            </h4>
            <p class="mb-0 small opacity-75">
                Diskon 10% khusus untuk tipe room Reguler dan VIP 1 dengan minimal booking 5 jam!
            </p>
        </div>
    </div>

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h3 class="text-white font-weight-bold mb-3 mb-md-0">
            Pilih Paket Promo Kamu
        </h3>
    </div>

    <!-- TABLE -->
    <div class="card bg-dark border-secondary shadow-lg" style="border-radius:15px; overflow:hidden;">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead class="bg-secondary text-uppercase small">
                    <tr>
                        <th class="py-3 px-4">Jenis PS</th>
                        <th class="py-3">Tipe Room</th>
                        <th class="py-3">Harga / Jam (Normal)</th>
                        <th class="py-3 text-center">Status</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $ada_data = false;
                    foreach($layanan as $l): 
                        // Mengubah teks ke huruf kecil agar pencocokan string lebih aman
                        $tipe_room = strtolower($l['tipe_room']);
                        
                        // Validasi: Hanya tampilkan jika mengandung kata 'reguler' atau 'vip 1'
                        if (strpos($tipe_room, 'reguler') !== false || strpos($tipe_room, 'vip 1') !== false): 
                            $ada_data = true;
                    ?>
                    <tr>
                        <td class="py-3 px-4 font-weight-bold">
                            <?= $l['jenis_ps']; ?>
                        </td>
                        <td class="py-3">
                            <span class="badge badge-info px-2 py-1"><?= $l['tipe_room']; ?></span>
                        </td>
                        <td class="py-3 text-success font-weight-bold">
                            Rp <?= number_format($l['harga_per_jam'],0,',','.'); ?>
                        </td>
                        <td class="py-3 text-center">
                            <span class="badge badge-success px-3 py-2">
                                <?= $l['status_room'] ?? 'Tersedia'; ?>
                            </span>
                        </td>
                        <td class="py-3 text-center">
                            <!-- Tombol Booking Diarahkan dengan membawa ID Layanan -->
                            <a href="/booking/pilih/<?= $l['id_layanan']; ?>" 
                               class="btn btn-warning btn-sm font-weight-bold px-3 shadow-sm"
                               style="border-radius: 8px;">
                                <i class="fas fa-gamepad mr-1"></i> Ambil Promo
                            </a>
                        </td>
                    </tr>
                    <?php 
                        endif;
                    endforeach; 
                    
                    if (!$ada_data):
                    ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            Layanan promo saat ini tidak tersedia.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.table-responsive::-webkit-scrollbar{
    height:8px;
}
.table-responsive::-webkit-scrollbar-thumb{
    background:#444;
    border-radius:10px;
}
</style>

<?= $this->endSection(); ?>