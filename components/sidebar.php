<?php
$pathToInclude = 'controllers/path.php';
include_once(__DIR__ . '/../' . $pathToInclude);
?>
<?php
$app_config = __DIR__ . '/../controllers/config.php';
include_once($app_config);
?>
<div id="preloader">
    <div class="inner">
        <div class="bolas">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= $url ?>">
            <span class="align-middle">Pedidos | <?= $app_name ?></span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Menu</li>

            <li class="sidebar-item <?php echo ($_SERVER['REQUEST_URI'] === '/painel_sacolapp/') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $url ?>">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Painel</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo (strpos($_SERVER['REQUEST_URI'], 'pedidos') !== false) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $url . 'views/pedidos' ?>">
                    <i class="align-middle" data-feather="layers"></i>
                    <span class="align-middle">Pedidos</span>
                </a>
            </li>
        </ul>
    </div>
</nav>