<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mb-4">
    <div class="p-4 bg-primary text-white shadow-sm" style="border-radius: 15px; background: linear-gradient(90deg, #007bff, #00d1ff);">
        <h4 class="font-weight-bold mb-1"><i class="fas fa-tools mr-2"></i> Panel Manajemen Menu</h4>
        <p class="mb-0 small opacity-75">Admin Mode: Anda dapat menambah, mengubah, atau menghapus unit PS.</p>
    </div>
</div>
<div class="container content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white font-weight-bold">Kelola Menu Makanan</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalMakan">
            <i class="fas fa-plus mr-2"></i> Tambah Menu
        </button>
    </div>

    <div class="card bg-dark border-secondary shadow">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr class="text-muted small">
                        <th>NAMA MENU</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($makanan as $m): ?>
                    <tr>
                        <td><?= $m['nama_menu']; ?></td>
                        <td>Rp <?= number_format($m['harga'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="/admin/hapus_makanan/<?= $m['id_menu']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMakan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white border-secondary">
            <form action="/admin/tambah_makanan" method="post">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">Tambah Menu Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control bg-secondary text-white border-0" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control bg-secondary text-white border-0" required>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>