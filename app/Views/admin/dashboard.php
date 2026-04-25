<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-lg-3 col-md-4 mb-4">

            <div class="card bg-dark border-secondary shadow"
                 style="border-radius:15px;">

                <div class="card-body text-center">

                    <img src="https://ui-avatars.com/api/?name=Admin&background=00d1ff&color=fff"
                         class="rounded-circle mb-3"
                         width="80">

                    <h5 class="text-white font-weight-bold mb-1">
                        <?= $nama; ?>
                    </h5>

                    <span class="badge badge-primary px-3 py-2">
                        Admin
                    </span>

                    <hr class="border-secondary">

                    <div class="list-group list-group-flush">

                        <a href="/admin/dashboard"
                           class="list-group-item list-group-item-action bg-transparent text-white border-0">
                            <i class="fas fa-home mr-2"></i>
                            Dashboard
                        </a>

                        <a href="/admin/layanan"
                           class="list-group-item list-group-item-action bg-transparent text-muted border-0">
                            <i class="fas fa-gamepad mr-2"></i>
                            Kelola PS
                        </a>

                        <a href="/admin/makanan"
                           class="list-group-item list-group-item-action bg-transparent text-muted border-0">
                            <i class="fas fa-utensils mr-2"></i>
                            Kelola Menu
                        </a>

                        <a href="/logout"
                           class="list-group-item list-group-item-action bg-transparent text-danger border-0">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </a>

                    </div>

                </div>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="col-lg-9 col-md-8">

            <h3 class="text-white font-weight-bold mb-4">
                Ringkasan Bisnis
            </h3>

            <!-- CARD STATS -->
            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="card bg-primary text-white shadow border-0 h-100"
                         style="border-radius:15px; min-height:140px;">

                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="text-uppercase small mb-2">
                                Total Booking
                            </h6>

                            <h2 class="font-weight-bold mb-0">
                                12
                            </h2>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card bg-success text-white shadow border-0 h-100"
                         style="border-radius:15px; min-height:140px;">

                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="text-uppercase small mb-2">
                                Pendapatan
                            </h6>

                            <h2 class="font-weight-bold mb-0">
                                Rp 450k
                            </h2>
                        </div>

                    </div>
                </div>

            </div>

            <!-- TABLE -->
            <div class="card bg-dark border-secondary shadow"
                 style="border-radius:15px; overflow:hidden;">

                <div class="card-header border-secondary bg-transparent d-flex justify-content-between align-items-center">

                    <h5 class="text-white mb-0">
                        Pesanan Masuk
                    </h5>

                    <a href="/admin/pesanan"
                       class="btn btn-outline-primary btn-sm">
                        Lihat Semua
                    </a>

                </div>

                <div class="table-responsive">

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
                                <td>
                                    <span class="badge badge-warning">
                                        Pending
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>Rafania</td>
                                <td>PS 4 - Reguler</td>
                                <td>3 Jam</td>
                                <td>Rp 24.000</td>
                                <td>
                                    <span class="badge badge-success">
                                        Selesai
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>
