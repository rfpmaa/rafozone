<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="layanan-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                <div class="text-center mb-5">
                    <h2 class="font-weight-bold text-white text-glow">KONFIRMASI <span class="text-gradient">BOOKING</span></h2>
                    <p class="text-muted">Lengkapi detail bermainmu di RafOzone</p>
                </div>

                <div class="card card-layanan shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <form action="/booking/simpan" method="POST">
                            <?= csrf_field(); ?>

                            <input type="hidden" name="id_layanan" value="<?= $layanan['id_layanan']; ?>">

                            <div class="row">
                                <div class="col-md-50">
                                    <div class="form-group mb-4">
                                        <label><i class="fas fa-gamepad text-primary mr-2"></i> Jenis PS & Room</label>
                                        <input type="text" class="form-control" value="<?= $layanan['jenis_ps']; ?> - <?= $layanan['tipe_room']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label><i class="fas fa-tag text-primary mr-2"></i> Harga per Jam</label>
                                        <input type="text" class="form-control" value="Rp <?= number_format($layanan['harga_per_jam'], 0, ',', '.'); ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr style="border-top: 1px solid rgba(255,255,255,0.1);" class="my-4">

                            <div class="form-group mb-4">
                                <label><i class="fas fa-clock text-primary mr-2"></i> Waktu Mulai</label>
                                <input type="datetime-local" name="waktu_mulai" class="form-control" required>
                            </div>

                            <div class="form-group mb-4">
                                <label><i class="fas fa-hourglass-half text-primary mr-2"></i> Durasi Bermain (Jam)</label>
                                <select name="durasi" class="custom-select" required>
                                    <?php for($i=1; $i<=10; $i++): ?>
                                        <option value="<?= $i; ?>"><?= $i; ?> Jam</option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <label><i class="fas fa-utensils text-primary mr-2"></i> Tambah Cemilan? (Opsional)</label>
                                <select name="id_menu" class="custom-select">
                                    <option value="">Tidak Pesan</option>
                                    <?php if (!empty($menu)) : ?>
                                        <?php foreach($menu as $m): ?>
                                            <option value="<?= $m['id_menu']; ?>">
                                                <?= $m['nama_menu']; ?> (+ Rp <?= number_format($m['harga'], 0, ',', '.'); ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-confirm btn-block py-3">
                                <i class="fas fa-file-invoice mr-2"></i> KONFIRMASI & BUAT INVOICE
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>