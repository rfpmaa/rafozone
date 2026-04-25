<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <!-- HEADER -->
    <div class="mb-4">
        <div class="p-4 shadow"
             style="border-radius:15px; background:linear-gradient(90deg,#007bff,#00d1ff);">

            <h4 class="font-weight-bold text-white mb-1">
                <i class="fas fa-receipt mr-2"></i>
                Data Pesanan Booking
            </h4>

            <p class="text-white mb-0 small">
                Kelola seluruh transaksi booking customer RafOzone.
            </p>
        </div>
    </div>

    <!-- FILTER -->
    <div class="card bg-dark border-secondary shadow mb-4"
         style="border-radius:15px;">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <input type="text"
                           class="form-control bg-secondary border-0 text-white"
                           placeholder="Cari nama customer...">
                </div>

                <div class="col-md-3 mb-3">
                    <select class="form-control bg-secondary border-0 text-white">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Selesai</option>
                        <option>Cancel</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <input type="date"
                           class="form-control bg-secondary border-0 text-white">
                </div>

                <div class="col-md-2 mb-3">
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>

        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white border-0 shadow h-100"
                 style="border-radius:15px;">
                <div class="card-body">
                    <h6 class="small text-uppercase">Total Hari Ini</h6>
                    <h3 class="font-weight-bold mb-0">12</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark border-0 shadow h-100"
                 style="border-radius:15px;">
                <div class="card-body">
                    <h6 class="small text-uppercase">Pending</h6>
                    <h3 class="font-weight-bold mb-0">4</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white border-0 shadow h-100"
                 style="border-radius:15px;">
                <div class="card-body">
                    <h6 class="small text-uppercase">Selesai</h6>
                    <h3 class="font-weight-bold mb-0">8</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white border-0 shadow h-100"
                 style="border-radius:15px;">
                <div class="card-body">
                    <h6 class="small text-uppercase">Pendapatan</h6>
                    <h3 class="font-weight-bold mb-0">Rp 450k</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="card bg-dark border-secondary shadow"
         style="border-radius:15px; overflow:hidden;">

        <div class="card-header bg-transparent border-secondary d-flex justify-content-between align-items-center">

            <h5 class="text-white mb-0">
                <i class="fas fa-list mr-2"></i>
                Semua Pesanan
            </h5>

            <a href="/admin/dashboard"
               class="btn btn-outline-light btn-sm">
                <i class="fas fa-arrow-left mr-1"></i>
                Dashboard
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-dark table-hover mb-0">

                <thead>
                    <tr class="text-muted small text-uppercase">
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Durasi</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>INV001</td>
                        <td>Oryza</td>
                        <td>PS 5 VIP</td>
                        <td>25/04/26</td>
                        <td>2 Jam</td>
                        <td>Rp 40.000</td>
                        <td>
                            <span class="badge badge-warning">
                                Pending
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success">
                                Konfirmasi
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>INV002</td>
                        <td>Rafania</td>
                        <td>PS 4 Reguler</td>
                        <td>25/04/26</td>
                        <td>3 Jam</td>
                        <td>Rp 24.000</td>
                        <td>
                            <span class="badge badge-success">
                                Selesai
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>INV003</td>
                        <td>Farhan</td>
                        <td>PS 5 VIP</td>
                        <td>25/04/26</td>
                        <td>1 Jam</td>
                        <td>Rp 20.000</td>
                        <td>
                            <span class="badge badge-danger">
                                Cancel
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-secondary">
                                Hapus
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>
