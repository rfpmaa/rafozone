<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container content-wrapper">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-dark border-secondary shadow" style="border-radius: 15px;">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=00d1ff&color=fff" class="rounded-circle mb-3" width="80">
                    <h5 class="text-white font-weight-bold"><?= $nama; ?></h5>
                    <span class="badge badge-primary">Administrator</span>
                    <hr class="border-secondary">
                    <div class="list-group list-group-flush bg-transparent">
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

        <div class="col-md-9">
            <h3 class="text-white font-weight-bold mb-4">Ringkasan Bisnis</h3>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white shadow border-0" style="border-radius: 15px;">
                        <div class="card-body">
                            <h6 class="text-uppercase small">Total Booking</h6>
                            <h2 class="font-weight-bold">12</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-success text-white shadow border-0" style="border-radius: 15px;">
                        <div class="card-body">
                            <h6 class="text-uppercase small">Pendapatan</h6>
                            <h2 class="font-weight-bold">Rp 450k</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info text-white shadow border-0" style="border-radius: 15px;">
                        <div class="card-body">
                            <h6 class="text-uppercase small">User Aktif</h6>
                            <h2 class="font-weight-bold">25</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-dark border-secondary shadow" style="border-radius: 15px;">
                <div class="card-header border-secondary bg-transparent d-flex justify-content-between">
                    <h5 class="text-white mb-0">Pesanan Masuk</h5>
                    <button class="btn btn-outline-primary btn-sm">Lihat Semua</button>
                </div>
                <div class="card-body p-0">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr class="text-muted small text-uppercase">
                                <th>Customer</th>
                                <th>Layanan</th>
                                <th>Durasi</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Oryza</td>
                                <td>PS 5 - VIP</td>
                                <td>2 Jam</td>
                                <td>Rp 40.000</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Rafania</td>
                                <td>PS 4 - Reguler</td>
                                <td>3 Jam</td>
                                <td>Rp 24.000</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>