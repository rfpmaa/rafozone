<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <!-- HEADER -->
    <div class="mb-4">
        <div class="p-4 text-white shadow-sm"
             style="border-radius:15px; background:linear-gradient(90deg,#007bff,#00d1ff);">

            <h4 class="font-weight-bold mb-1">
                <i class="fas fa-tools mr-2"></i>
                Panel Manajemen Menu
            </h4>

            <p class="mb-0 small opacity-75">
                Admin Mode: Anda dapat menambah, mengubah, atau menghapus menu makanan.
            </p>

        </div>
    </div>

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <h3 class="text-white font-weight-bold mb-3 mb-md-0">
            Kelola Menu Makanan
        </h3>

        <button class="btn btn-primary px-4"
                data-toggle="modal"
                data-target="#modalMakan">

            <i class="fas fa-plus mr-2"></i>
            Tambah Menu
        </button>

    </div>

    <!-- TABLE -->
    <div class="card bg-dark border-secondary shadow"
         style="border-radius:15px; overflow:hidden;">

        <div class="table-responsive">

            <table class="table table-dark table-hover mb-0">

                <thead>
                    <tr class="text-muted small text-uppercase">
                        <th class="px-4 py-3">Nama Menu</th>
                        <th class="py-3">Harga</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($makanan as $m): ?>
                    <tr>

                        <td class="px-4 py-3 font-weight-bold">
                            <?= $m['nama_menu']; ?>
                        </td>

                        <td class="py-3 text-success font-weight-bold">
                            Rp <?= number_format($m['harga'],0,',','.'); ?>
                        </td>

                        <td class="py-3 text-center">
                            <a href="/admin/hapus_makanan/<?= $m['id_menu']; ?>"
                               class="btn btn-danger btn-sm rounded-circle shadow-sm"
                               onclick="return confirm('Yakin hapus menu ini?')"
                               style="width:32px; height:32px; padding:5px;">

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

<!-- MODAL -->
<div class="modal fade" id="modalMakan" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content bg-dark text-white border-secondary"
             style="border-radius:20px;">

            <form action="/admin/tambah_makanan" method="post">

                <div class="modal-header border-secondary">

                    <h5 class="modal-title font-weight-bold text-primary">
                        Tambah Menu Baru
                    </h5>

                    <button type="button"
                            class="close text-white"
                            data-dismiss="modal">

                        &times;
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="small">Nama Menu</label>

                        <input type="text"
                               name="nama_menu"
                               class="form-control bg-secondary text-white border-0"
                               placeholder="Contoh: Indomie Goreng"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="small">Harga</label>

                        <input type="number"
                               name="harga"
                               class="form-control bg-secondary text-white border-0"
                               placeholder="Contoh: 12000"
                               required>
                    </div>

                </div>

                <div class="modal-footer border-secondary">

                    <button type="button"
                            class="btn btn-outline-light"
                            data-dismiss="modal">

                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-primary px-4">

                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
