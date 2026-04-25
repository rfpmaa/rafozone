<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container"
     style="padding-top:120px; padding-bottom:50px;">

    <!-- HEADER -->
    <div class="mb-4">
        <div class="p-4 text-white shadow-sm"
             style="border-radius:15px; background:linear-gradient(90deg,#007bff,#00d1ff);">

            <h4 class="font-weight-bold mb-1">
                <i class="fas fa-tools mr-2"></i>
                Panel Manajemen Layanan
            </h4>

            <p class="mb-0 small opacity-75">
                Admin Mode: Anda dapat menambah, mengubah, atau menghapus unit PS.
            </p>
        </div>
    </div>

    <!-- TITLE + BUTTON -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <h3 class="text-white font-weight-bold mb-3 mb-md-0">
            Kelola Layanan PS
        </h3>

        <button class="btn btn-primary px-4 shadow-sm"
                data-toggle="modal"
                data-target="#modalTambah">

            <i class="fas fa-plus mr-2"></i>
            Tambah Layanan
        </button>
    </div>

    <!-- ALERT -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="card bg-dark border-secondary shadow-lg"
         style="border-radius:15px; overflow:hidden;">

        <div class="table-responsive">

            <table class="table table-dark table-hover mb-0">

                <thead class="bg-secondary text-uppercase small">
                    <tr>
                        <th class="py-3 px-4">Jenis PS</th>
                        <th class="py-3">Tipe Room</th>
                        <th class="py-3">Harga / Jam</th>
                        <th class="py-3 text-center">Status</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($layanan as $l): ?>
                    <tr>

                        <td class="py-3 px-4 font-weight-bold">
                            <?= $l['jenis_ps']; ?>
                        </td>

                        <td class="py-3">
                            <?= $l['tipe_room']; ?>
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
                            <a href="/admin/hapus_layanan/<?= $l['id_layanan']; ?>"
                               class="btn btn-danger btn-sm rounded-circle shadow-sm"
                               onclick="return confirm('Yakin hapus layanan ini?')"
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
<div class="modal fade" id="modalTambah" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content bg-dark text-white border-secondary"
             style="border-radius:20px;">

            <div class="modal-header border-secondary">
                <h5 class="modal-title font-weight-bold text-primary">
                    Tambah Layanan Baru
                </h5>

                <button type="button"
                        class="close text-white"
                        data-dismiss="modal">

                    &times;
                </button>
            </div>

            <form action="/admin/tambah_layanan" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <label class="small">Jenis PS</label>

                        <input type="text"
                               name="jenis_ps"
                               class="form-control bg-secondary text-white border-0"
                               placeholder="Contoh: PlayStation 5"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="small">Tipe Room</label>

                        <input type="text"
                               name="tipe_room"
                               class="form-control bg-secondary text-white border-0"
                               placeholder="Contoh: VIP (AC + Sofa)"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="small">Harga per Jam</label>

                        <input type="number"
                               name="harga_per_jam"
                               class="form-control bg-secondary text-white border-0"
                               placeholder="Misal: 15000"
                               required>
                    </div>

                </div>

                <div class="modal-footer border-secondary">

                    <button type="button"
                            class="btn btn-outline-light px-4"
                            data-dismiss="modal">

                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-primary px-4">

                        Simpan Data
                    </button>

                </div>

            </form>

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
