<?php
include_once('controllers/auth/verify_login.php');
?>
<?php
if ($_SESSION['is_admin'] != 1) {
	header("Location: $url");
	exit();
}
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
	<title>Cadastro | <?= $app_name ?></title>

</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Comece aqui</h1>
							<p class="lead">
								Crie um novo usuário para o sistema!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<div id="msg" class="text-center"></div>
									<form id="cadastroForm">
										<div class="mb-3">
											<label class="form-label">Nome completo</label>
											<input class="form-control form-control-lg" type="text" name="nome" placeholder="Digite seu nome" autocomplete="off" autofocus />
										</div>
										<div class="mb-3">
											<label class="form-label">Usuário</label>
											<input class="form-control form-control-lg" type="text" name="usuario" placeholder="Digite seu usuário" autocomplete="off" />
										</div>
										<div class="mb-3">
											<label class="form-label">Senha</label>
											<div class="d-flex">
												<input id="user_pass" class="form-control form-control-lg" type="password" name="senha" placeholder="Digite uma senha" autocomplete="off" />
												<button id="toggle-pass" type="button" class="btn btn-outline-primary ms-1">
													Mostrar
												</button>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button class="btn btn-lg btn-primary" id="cadBtn">Cadastrar</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<?php
	include('components/scripts_auth.php');
	?>
</body>

</html>