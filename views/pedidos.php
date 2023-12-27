<?php
include_once('../controllers/auth/verify_login.php');
?>
<?php
$app_config = __DIR__ . '/../controllers/config.php';
include_once($app_config);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include_once('../components/head.php');
    ?>
    <title>Pedidos | <?= $app_name ?></title>
</head>

<body>
    <div class="wrapper">

        <?php
        include_once('../components/sidebar.php');
        ?>

        <div class="main">
            <?php
            include_once('../components/navbar.php');
            ?>

            <main class="content mw-100">
                <div class="container-fluid p-0">

                    <div class="mb-3 d-flex justify-content-between">
                        <h1 class="h3 d-inline align-middle">Pedidos</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex flex-row align-items-end justify-content-center">
                                        <label style="font-size: 16px;" class="form-label text-nowrap" for="filtro-situacao">Filtrar por situação</label>
                                        <select style="font-size: 16px; cursor: pointer;" class="form-select form-select-lg ms-2" id="filtro-situacao">
                                            <option value="">Todos</option>
                                            <option value="0">Pendentes</option>
                                            <option class="bg-success text-white" value="1">Concluídos</option>
                                            <option class="bg-danger text-white" value="2">Cancelados</option>
                                        </select>
                                    </div>
                                    <table id="read-table" class="table table-bordered table-hover align-middle text-center">
                                        <thead>
                                            <tr>
                                                <th>Código do pedido</th>
                                                <th>Situação</th>
                                                <th>Nº do Cliente</th>
                                                <th>Recebido em</th>
                                                <th width="20">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </div>

    <?php
    include_once('../components/scripts.php');
    ?>

    <?php
    include_once('toasts/liveToast.php');
    ?>

    <?php
    include_once('modals/pedidos/exibir_pedido.php');
    ?>

    <?php
    include_once('modals/pedidos/concluir.php');
    ?>

    <?php
    include_once('modals/pedidos/cancelar.php');
    ?>

    <?php
    include_once('modals/pedidos/restaurar.php');
    ?>

    <script src="../js/scripts_pedidos.js?ver=1.1"></script>

    <script src="../js/ajax_pedidos.js?ver=1.1"></script>

</body>

</html>