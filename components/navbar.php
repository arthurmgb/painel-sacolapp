<nav class="navbar sticky-top navbar-expand navbar-light navbar-bg mw-100">
    <a id="toggleMenu" class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">

                    <span id="nomeNav" class="text-dark">Olá, <?= $_SESSION['nome']; ?></span>
                </a>
                <div id="drop-menu" class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?= $url ?>views/perfil">
                        <i class="align-middle me-1" data-feather="user"></i>
                        Perfil
                    </a>
                    <?php if ($_SESSION['is_admin'] == 1) : ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="<?= $url ?>cadastro">
                            <i class="align-middle me-1" data-feather="user-plus"></i>
                            Novo usuário
                        </a>
                    <?php endif ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= $url ?>controllers/auth/logout">
                        <i class="align-middle me-1" data-feather="log-out"></i>
                        Sair
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>