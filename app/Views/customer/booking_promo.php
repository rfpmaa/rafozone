<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="layanan-wrapper" style="padding-top:120px; padding-bottom:50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="text-center mb-5">
                    <h2 class="font-weight-bold text-white text-glow">
                        KONFIRMASI <span class="text-gradient">BOOKING PROMO</span>
                    </h2>
                    <p class="text-muted">Dapatkan Diskon 10% dengan bermain minimal 5 Jam!</p>
                </div>

                <div class="card card-layanan shadow-lg border-0" style="background-color: #1a1e29; border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">

                        <form action="/booking/simpan_promo" method="POST">
                            <?= csrf_field(); ?>

                            <input type="hidden" name="id_layanan" value="<?= $layanan['id_layanan']; ?>">
                            <input type="hidden" name="jenis_ps" value="<?= $layanan['jenis_ps']; ?> - <?= $layanan['tipe_room']; ?>">
                            <input type="hidden" id="harga_per_jam" name="harga_per_jam" value="<?= $layanan['harga_per_jam']; ?>">

                            <div class="alert alert-info bg-dark border-info text-white small mb-4" style="border-radius: 10px;">
                                <i class="fas fa-info-circle text-info mr-2"></i> 
                                <strong>Info Promo:</strong> Pilih durasi <strong>5 jam atau lebih</strong> untuk mengaktifkan potongan harga diskon 10% secara otomatis pada invoice!
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-4">
                                        <label class="text-white-50"><i class="fas fa-gamepad text-primary mr-2"></i> Jenis PS & Room</label>
                                        <input type="text" class="form-control bg-dark text-white border-0" value="<?= $layanan['jenis_ps']; ?> - <?= $layanan['tipe_room']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="text-white-50"><i class="fas fa-tag text-primary mr-2"></i> Harga / Jam</label>
                                        <input type="text" class="form-control bg-dark text-white border-0" value="Rp <?= number_format($layanan['harga_per_jam'],0,',','.'); ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr style="border-top:1px solid rgba(255,255,255,0.1);" class="my-4">

                            <div class="form-group mb-4">
                                <label class="text-white-50"><i class="fas fa-clock text-primary mr-2"></i> Waktu Mulai</label>
                                <input type="datetime-local" name="waktu_mulai" class="form-control" required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-white-50"><i class="fas fa-hourglass-half text-primary mr-2"></i> Durasi Bermain (Jam)</label>
                                <select id="durasi" name="durasi" class="custom-select bg-dark text-white border-0" required>
                                    <?php for($i=1; $i<=10; $i++): ?>
                                        <option value="<?= $i; ?>">
                                            <?= $i; ?> Jam <?= ($i >= 5) ? '🔥 (Promo Diskon 10%)' : ''; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-white-50"><i class="fas fa-utensils text-primary mr-2"></i> Tambah Cemilan? (Opsional)</label>
                                <select id="makanan" name="makanan" class="custom-select bg-dark text-white border-0">
                                    <option value="">Tidak Pesan</option>
                                    <?php foreach($makanan as $m): ?>
                                        <option value="<?= $m['nama_menu']; ?>|<?= $m['harga']; ?>">
                                            <?= $m['nama_menu']; ?> (+ Rp <?= number_format($m['harga'],0,',','.'); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="p-3 my-4 rounded" style="background-color: rgba(0,0,0,0.2); border: 1px dashed rgba(255,255,255,0.1);">
                                <h6 class="text-white font-weight-bold mb-3"><i class="fas fa-calculator mr-2 text-warning"></i> Rincian Pembayaran:</h6>
                                
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-muted">Total Harga PS:</span>
                                    <span class="text-white" id="view_total_ps">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-muted">Tambahan Cemilan:</span>
                                    <span class="text-white" id="view_total_makanan">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-muted">Total Sebelum Diskon:</span>
                                    <span class="text-white" id="view_total_kotor">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-muted">Potongan Diskon (10%):</span>
                                    <span class="text-danger font-weight-bold" id="view_diskon">Rp 0</span>
                                </div>
                                <hr style="border-top: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="font-weight-bold text-white">Total Akhir:</span>
                                    <span class="h4 font-weight-bold text-success m-0" id="view_total_akhir">Rp 0</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning btn-block py-3 text-dark font-weight-bold" style="border-radius: 10px; font-size: 16px;">
                                <i class="fas fa-file-invoice mr-2"></i> KONFIRMASI & BUAT INVOICE PROMO
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const hargaPerJamInput = document.getElementById('harga_per_jam');
    const durasiSelect = document.getElementById('durasi');
    const makananSelect = document.getElementById('makanan');

    const viewTotalPs = document.getElementById('view_total_ps');
    const viewTotalMakanan = document.getElementById('view_total_makanan');
    const viewTotalKotor = document.getElementById('view_total_kotor');
    const viewDiskon = document.getElementById('view_diskon');
    const viewTotalAkhir = document.getElementById('view_total_akhir');

    function formatRupiah(angka) {
        return "Rp " + angka.toLocaleString('id-ID');
    }

    function hitungTotal() {
        const hargaPerJam = parseInt(hargaPerJamInput.value) || 0;
        const durasi = parseInt(durasiSelect.value) || 0;
        
        // 1. Hitung total dasar PS
        let totalPs = hargaPerJam * durasi;
        viewTotalPs.innerText = formatRupiah(totalPs);

        // 2. Cek harga makanan
        let hargaMakanan = 0;
        if(makananSelect.value !== "") {
            const pecah = makananSelect.value.split('|');
            hargaMakanan = parseInt(pecah[1]) || 0;
        }
        viewTotalMakanan.innerText = formatRupiah(hargaMakanan);

        // 3. Total Kotor sebelum dikurangi diskon
        let totalKotor = totalPs + hargaMakanan;
        viewTotalKotor.innerText = formatRupiah(totalKotor);

        // 4. Hitung Diskon khusus PS (Hanya aktif jika durasi >= 5)
        let diskon = 0;
        if (durasi >= 5) {
            diskon = totalPs * 0.10;
        }
        viewDiskon.innerText = "- " + formatRupiah(diskon);

        // 5. Total akhir setelah diskon
        let totalAkhir = totalKotor - diskon;
        viewTotalAkhir.innerText = formatRupiah(totalAkhir);
    }

    // Jalankan hitungan setiap ada perubahan input
    durasiSelect.addEventListener('change', hitungTotal);
    makananSelect.addEventListener('change', hitungTotal);

    // Jalankan pertama kali saat halaman dimuat
    hitungTotal();
});
</script>
<?= $this->endSection(); ?>