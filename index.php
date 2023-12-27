<?php
include_once('controllers/auth/verify_login.php');
?>
<?php
$app_config = __DIR__ . '/controllers/config.php';
include_once($app_config);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  include_once('components/head.php');
  ?>
  <title>Painel | <?= $app_name ?></title>
</head>

<body>
  <div class="wrapper">

    <?php
    include_once('components/sidebar.php');
    ?>

    <div class="main main-index">

      <?php
      include_once('components/navbar.php');
      ?>

      <main class="content mw-100">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">Painel</h1>

          <div class="row">
            <div class="col-12 col-md-5">
              <a href="<?= $url . 'views/pedidos' ?>" class="text-decoration-none">
                <div class="card hover-card" style="border-left: 3px solid #3b7ddd;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 d-flex align-items-start justify-content-between flex-wrap">
                        <h5 class="card-title">Pedidos</h5>
                        <div class="stat text-primary">
                          <i class="align-middle" data-feather="layers"></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <h1 class="mt-1 mb-3" id="contagemPedidos"></h1>
                        <div class="mb-0 d-flex flex-column align-items-start justify-content-center">
                          <div class="counts">
                            <span class="badge bg-primary">
                              <i class="mdi mdi-arrow-bottom-right"></i> <span id="contagemPedidosPendentes"></span>
                            </span>
                            <span class="text-muted">pendentes</span>
                          </div>
                          <div class="counts">
                            <span class="badge bg-success">
                              <i class="mdi mdi-arrow-bottom-right"></i> <span id="contagemPedidosConcluidos"></span>
                            </span>
                            <span class="text-muted">concluídos</span>
                          </div>
                          <div class="counts">
                            <span class="badge bg-danger">
                              <i class="mdi mdi-arrow-bottom-right"></i> <span id="contagemPedidosCancelados"></span>
                            </span>
                            <span class="text-muted">cancelados</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </main>

      <?php
      include_once('components/footer.php');
      ?>

    </div>
  </div>

  <?php
  include_once('components/scripts.php');
  ?>

  <script src="js/scripts_index.js?ver=1.0"></script>

</body>

</html>