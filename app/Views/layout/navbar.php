<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="bi bi-book"></i>&nbsp;SIG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == "Beranda") ? "active" : ""; ?>" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == "Pemetaan") ? "active" : ""; ?>" href="/map">Pemetaaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == "Daftar Sekolah") ? "active" : ""; ?>" href="/sekolah">Data Sekolah</a>
                    </li>
                    <?php if(session('role') == 'admin') :?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == "Validasi Akun") ? "active" : ""; ?>" href="/validasiakun">Validasi Akun</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= ucfirst(session('role')); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <small>
                                    <?php if (session('role') == 'sekolah') : ?>
                                        <a class="dropdown-item <?= ($title == "Profil Sekolah") ? "active" : ""; ?>" href="/profil"><i class="bi bi-house-door"></i> Profil Sekolah</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item <?= ($title == "Ganti Password") ? "active" : ""; ?>" href="/gantipassword"><i class="bi bi-key"></i> Ganti Password</a>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form action="/signout" method="post">
                                        <?= csrf_field(); ?>
                                        <button type="submit" class="dropdown-item" style="background-color: transparent;" onclick="return confirm('Apakah Anda Yakin Untuk Logout?');"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
                                    </form>
                                </small>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link  <?= ($title == "Login") ? "active" : ""; ?>" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>