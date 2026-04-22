<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg border-0" style="width: 100%; max-width: 450px; background: var(--card-bg); border-radius: 20px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="font-weight-bold text-gradient">Join RafOzone</h3>
                <p class="text-muted small">Daftar sekarang untuk mulai booking PS favoritmu!</p>
            </div>
            
            <form action="/auth/simpan_register" method="post">
                <div class="form-group">
                    <label class="small text-light">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Rafania Putri" required>
                </div>
                
                <div class="form-group">
                    <label class="small text-light">Email Address</label>
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary" placeholder="email@gmail.com" required>
                </div>
                
                <div class="form-group">
                    <label class="small text-light">Password</label>
                    <input type="password" name="password" class="form-control bg-dark text-white border-secondary" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4 py-2 shadow-sm font-weight-bold">
                    Daftar Sekarang
                </button>
            </form>
            
            <div class="text-center mt-4">
                <p class="small text-muted">Sudah punya akun? <a href="/login" class="text-primary font-weight-bold">Login Masuk</a></p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tambahan kecil biar inputnya makin cakep saat diklik */
    .form-control:focus {
        background-color: #1a1a1a !important;
        border-color: var(--primary);
        color: white;
        box-shadow: 0 0 8px rgba(0, 209, 255, 0.2);
    }
</style>
<?= $this->endSection(); ?>