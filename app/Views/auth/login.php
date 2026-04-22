<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px; background: var(--card-bg);">
        <div class="card-body text-center">
            <h3 class="font-weight-bold mb-4 text-gradient">Login RafOzone</h3>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger p-2 small"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="/auth/cek_login" method="post">
                <div class="form-group text-left">
                    <label class="small">Email Address</label>
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary" placeholder="email@gmail.com" required>
                </div>
                <div class="form-group text-left">
                    <label class="small">Password</label>
                    <input type="password" name="password" class="form-control bg-dark text-white border-secondary" placeholder="******" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4 shadow">Masuk Sekarang</button>
            </form>
            
            <p class="mt-4 small text-muted">Belum punya akun? <a href="/register" class="text-primary">Daftar di sini</a></p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
