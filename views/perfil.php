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
	<title>Perfil | <?= $app_name ?></title>
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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Perfil</h1>

					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Informações</h5>
								</div>
								<div class="card-body text-center">
									<img style="user-select: none; -webkit-user-drag: none;" src="https://cdn3d.iconscout.com/3d/premium/thumb/avatar-6684102-5523018.png?f=webp" alt="Foto" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 id="titleNome" class="card-title mb-0"><?= $_SESSION['nome']; ?></h5>
									<div class="text-muted mb-2">
										<?= $_SESSION['is_admin'] == "1" ? "<i class='fa-solid fa-crown'></i> Administrador" : "Funcionário"; ?>
									</div>

									<div>
										<a class="btn btn-outline-danger btn-sm px-4" href="<?= $url ?>controllers/auth/logout"><span data-feather="log-out"></span> Sair</a>
									</div>
								</div>
								<hr class="my-0" />
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Atualizar dados da conta</h5>
								</div>
								<div class="card-body h-100">
									<?php
									include_once('../controllers/profile/read.php');
									?>
									<div id="msg"></div>
									<form id="updateUserInfo">
										<div class="mb-3">
											<label for="nome" class="form-label">Nome completo</label>
											<input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($nome); ?>" autocomplete="off">
										</div>
										<div class="mb-3">
											<label for="usuario" class="form-label">Usuário</label>
											<input type="text" class="form-control" name="usuario" value="<?= htmlspecialchars($usuario); ?>" autocomplete="off">
										</div>
										<button id="btnUpdateUserInfo" type="submit" class="btn btn-primary mb-3">Atualizar</button>
									</form>
									<hr class="mb-3">
									<div id="msgPass"></div>
									<form id="updateUserPass">
										<div class="mb-3">
											<label for="senha" class="form-label">Senha atual</label>
											<div class="d-flex">
												<input id="senha_atual" type="password" class="form-control" name="senha_atual" autocomplete="off">
												<button id="toggle-pass-a" type="button" class="btn btn-outline-primary ms-1">
													Mostrar
												</button>
											</div>
										</div>
										<div class="mb-3">
											<label for="nova_senha" class="form-label">Nova senha</label>
											<div class="d-flex">
												<input id="nova_senha" type="password" class="form-control" name="nova_senha" autocomplete="off">
												<button id="toggle-pass-n" type="button" class="btn btn-outline-primary ms-1">
													Mostrar
												</button>
											</div>
										</div>
										<button id="btnUpdateUserPass" type="submit" class="btn btn-danger mb-3">Atualizar</button>
									</form>
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
	<script src="../js/ajax_auth.js?ver=1.0"></script>
	<script>
		let toggle = document.querySelector("#toggle-pass-a");
		let user_pass = document.querySelector("#senha_atual");
		let isEnabled = true;
		toggle.addEventListener("click", () => {
			if (isEnabled) {
				toggle.textContent = 'Ocultar';
				user_pass.setAttribute('type', 'text');
			} else {
				toggle.textContent = 'Mostrar';
				user_pass.setAttribute('type', 'password');
			}
			isEnabled = !isEnabled;
		});

		let toggle2 = document.querySelector("#toggle-pass-n");
		let user_pass2 = document.querySelector("#nova_senha");
		let isEnabled2 = true;
		toggle2.addEventListener("click", () => {
			if (isEnabled2) {
				toggle2.textContent = 'Ocultar';
				user_pass2.setAttribute('type', 'text');
			} else {
				toggle2.textContent = 'Mostrar';
				user_pass2.setAttribute('type', 'password');
			}
			isEnabled2 = !isEnabled2;
		});
	</script>

</body>

</html>