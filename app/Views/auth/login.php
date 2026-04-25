<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height:100vh; padding-top:110px; padding-bottom:40px;">

    <div class="card shadow-lg border-0"
         style="width:100%; max-width:420px; background:var(--card-bg); border-radius:20px;">

        <div class="card-body p-4 p-md-5 text-center">

            <h3 class="font-weight-bold mb-4 text-gradient">
                Login RafOzone
            </h3>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger p-2 small text-left">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success p-2 small text-left">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="/auth/cek_login" method="post">

                <?= csrf_field(); ?>

                <div class="form-group text-left">
                    <label class="small font-weight-bold">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control bg-dark text-white border-secondary"
                           placeholder="email@gmail.com"
                           required>
                </div>

                <div class="form-group text-left">
                    <label class="small font-weight-bold">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control bg-dark text-white border-secondary"
                           placeholder="******"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block mt-4 py-2 shadow font-weight-bold">
                    Masuk Sekarang
                </button>

            </form>

            <p class="mt-4 small text-muted mb-0">
                Belum punya akun?
                <a href="/register" class="text-primary font-weight-bold">
                    Daftar di sini
                </a>
            </p>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>
