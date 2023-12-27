<?php
$app_config = __DIR__ . '/../controllers/config.php';
include_once($app_config);
?>
<footer class="footer mw-100">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0 text-muted">
                    <strong><?= $app_name ?></strong> -
                    <strong>Todos os direitos reservados</strong> &copy;
                </p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-0">v1.0</p>
            </div>
        </div>
    </div>
</footer>