<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            RAFOZ<span style="color: white;">ONE</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-center">

                <?php if (session()->get('role') == 'admin') : ?>

                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active text-primary' : ''; ?>" href="/admin/dashboard">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'admin/layanan') ? 'active text-primary' : ''; ?>" href="/admin/layanan">Kelola PS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'admin/makanan') ? 'active text-primary' : ''; ?>" href="/admin/makanan">Kelola Menu</a>
                    </li>

                    <li class="nav-item ml-lg-3">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="fas fa-user-shield mr-1"></i>
                                <?= session()->get('nama'); ?>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right bg-dark border-secondary">
                                <a class="dropdown-item text-white" href="/logout">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                            </div>
                        </div>
                    </li>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/layanan">Layanan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Daftar Menu</a>
                    </li>

                    <?php if (session()->get('logged_in')) : ?>

                        <li class="nav-item mx-lg-3">
                            <span class="nav-link text-info font-weight-bold">
                                <i class="fas fa-user-circle mr-1"></i>
                                <?= session()->get('nama'); ?>
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-danger btn-sm px-4" href="/logout">Logout</a>
                        </li>

                    <?php else : ?>

                        <li class="nav-item ml-lg-3">
                            <a class="btn btn-primary btn-sm px-4" href="/login">Login</a>
                        </li>

                    <?php endif; ?>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
