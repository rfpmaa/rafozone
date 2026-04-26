<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <div class="row">

        <div class="col-lg-3 col-md-4 mb-4">
            <div class="card bg-dark border-secondary shadow" style="border-radius:15px;">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=00d1ff&color=fff"
                         class="rounded-circle mb-3" width="80">

                    <h5 class="text-white font-weight-bold mb-1">
                        <?= $nama; // Variabel dari Controller ?>
                    </h5>

                    <span class="badge badge-primary px-3 py-2">Admin</span>

                    <hr class="border-secondary">

                    <div class="list-group list-group-flush text-left">
                        <a href="/admin/dashboard" class="list-group-item list-group-item-action bg-transparent text-white border-0">
                            <i class="fas fa-home mr-2"></i> Dashboard
                        </a>
                        <a href="/admin/layanan" class="list-group-item list-group-item-action bg-transparent text-muted border-0">
                            <i class="fas fa-gamepad mr-2"></i> Kelola PS
                        </a>
                        <a href="/admin/makanan" class="list-group-item list-group-item-action bg-transparent text-muted border-0">
                            <i class="fas fa-utensils mr-2"></i> Kelola Menu
                        </a>
                        <a href="/logout" class="list-group-item list-group-item-action bg-transparent text-danger border-0">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8">

            <h3 class="text-white font-weight-bold mb-4">Ringkasan Bisnis</h3>

            <form action="/admin/pesanan" method="get" class="row mb-4">
                <div class="col-md-5 mb-2">
                    <input type="text" name="keyword" class="form-control bg-dark text-white border-secondary" 
                           placeholder="Cari nama customer..." value="<?= request()->getGet('keyword'); ?>">
                </div>
                <div class="col-md-4 mb-2">
                    <select name="status" class="form-control bg-dark text-white border-secondary">
                        <option value="">Semua Status</option>
                        <option value="Pending" <?= request()->getGet('status') == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="Selesai" <?= request()->getGet('status') == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Cancel" <?= request()->getGet('status') == 'Cancel' ? 'selected' : ''; ?>>Cancel</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                </div>
            </form>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card bg-primary text-white shadow border-0 h-100" style="border-radius:15px; min-height:140px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="text-uppercase small mb-2">Total Booking Hari Ini</h6>
                            <h2 class="font-weight-bold mb-0">12</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card bg-success text-white shadow border-0 h-100" style="border-radius:15px; min-height:140px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="text-uppercase small mb-2">Pendapatan</h6>
                            <h2 class="font-weight-bold mb-0">Rp 450k</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-dark border-secondary shadow" style="border-radius:15px; overflow:hidden;">
                <div class="card-header border-secondary bg-transparent d-flex justify-content-between align-items-center">
                    <h5 class="text-white mb-0">Pesanan Masuk</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr class="text-muted small text-uppercase">
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Layanan</th>
                                <th>Durasi</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pesanan)) : ?>
                                <?php foreach ($pesanan as $p) : ?>
                                <tr>
                                    <td><?= $p['invoice']; ?></td>
                                    <td><?= $p['customer']; ?></td>
                                    <td><?= $p['layanan']; ?></td>
                                    <td><?= $p['durasi']; ?> Jam</td>
                                    <td>Rp <?= number_format($p['total'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php 
                                            $badge = 'secondary';
                                            if ($p['status'] == 'Pending') $badge = 'warning';
                                            if ($p['status'] == 'Selesai') $badge = 'success';
                                            if ($p['status'] == 'Cancel') $badge = 'danger';
                                        ?>
                                        <span class="badge badge-<?= $badge; ?>"><?= $p['status']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($p['status'] == 'Pending') : ?>
                                            <form action="/admin/konfirmasi/<?= $p['id']; ?>" method="post" style="display:inline;">
                                                <?= csrf_field(); ?>
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pesanan ini?')">
                                                    Konfirmasi
                                                </button>
                                            </form>
                                        <?php else : ?>
                                            <button class="btn btn-outline-secondary btn-sm" disabled>No Action</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>