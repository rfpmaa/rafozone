<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="layanan-wrapper" style="padding-top:120px; padding-bottom:50px;">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col text-center">
                <h2 class="font-weight-bold text-white mb-2" style="font-size: 45px">
                    PROMO DAFTAR LAYANAN <span class="text-gradient">RafOzone</span>
                </h2>
                <div class="d-inline-block p-3 text-white font-weight-bold shadow-sm" 
                     style="border-radius:15px; background:linear-gradient(90deg, #ff416c, #ff4b2b); font-size: 16px;">
                    <i class="fas fa-percentage mr-2"></i> Diskon 10% Khusus Tipe Room Reguler & VIP 1 (Min. 5 Jam)
                </div>
            </div>
        </div>

        <div class="row">
            <?php 
            $ada_promo = false;
            foreach ($layanan as $l) : 
                $tipe_room = strtolower($l['tipe_room']);
                
                if (strpos($tipe_room, 'reguler') !== false || strpos($tipe_room, 'regular') !== false || preg_match('/\bvip\s+1\b/', $tipe_room)): 
                    $ada_promo = true;
                    
                    // Hitung potongan 10% untuk tampilan
                    $harga_normal = $l['harga_per_jam'];
                    $harga_diskon = $harga_normal - ($harga_normal * 0.10);
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan shadow-lg h-100 border-0">
                        <div class="card-body p-4">
                            <span class="badge badge-ps mb-3"><?= $l['jenis_ps']; ?></span>
                            <h4 class="card-title font-weight-bold text-white mb-2"><?= $l['tipe_room']; ?></h4>
                            
                            <div class="mb-3">
                                <span class="text-muted small text-decoration-line-through" style="text-decoration: line-through;">
                                    Rp <?= number_format($harga_normal, 0, ',', '.'); ?>
                                </span>
                                <h5 class="text-success font-weight-bold m-0">
                                    Rp <?= number_format($harga_diskon, 0, ',', '.'); ?> <span class="small text-muted" style="font-size:12px;">/ Jam (Promo)</span>
                                </h5>
                            </div>
                            
                            <div class="small mb-4">
                                <span class="text-muted">Status: </span>
                                <span class="badge <?= (strtolower($l['status_room']) == 'tersedia') ? 'badge-success' : 'badge-danger'; ?>">
                                    <?= strtoupper($l['status_room']); ?>
                                </span>
                            </div>

                            <a href="/booking/promo/<?= $l['id_layanan']; ?>" class="btn btn-warning btn-block text-dark font-weight-bold">
                                <i class="fas fa-bolt mr-2"></i> Ambil Promo
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                endif; 
            endforeach; 

            if (!$ada_promo) : 
            ?>
                <div class="col text-center py-5">
                    <p class="text-muted" style="font-size: 18px;">Maaf, promo untuk kategori Reguler atau VIP 1 belum tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>