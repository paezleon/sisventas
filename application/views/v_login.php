<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $titulo ?></title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
	<style type="text/css" media="screen">
		body{
			background-image: url('./assets/img/fondo.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			background-attachment: fixed;
		}
		.container{
			padding-top: 120px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card text-center">
					<div class="card-header">
						Ingrese sus Credenciales
					</div>
					<div class="card-body">
						<?php if ($this->session->flashdata('alerta')): ?>
							<div class="alert alert-warning" role="alert">
								<strong>Atención!</strong> <?= $this->session->flashdata('alerta'); ?>.
							</div>
						<?php endif ?>
						<h4 class="card-title"><img src="<?= base_url('assets/img/sois_1.png') ?>" alt="SOIS"></h4>
						<form action="<?= base_url('comprobar_credenciales') ?>" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-8 offset-md-2">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-secondary" type="button" disabled="disabled"><i class="fas fa-user"></i></button>
											</span>
											<input type="text" class="form-control" placeholder="Ingrese su usuario" name="txtUsuario">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 offset-md-2">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-secondary" type="button" disabled="disabled"><i class="fas fa-lock"></i></button>
											</span>
											<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="txtPassword">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 offset-md-2">
									<button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-out-alt"></i> Ingresar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/fontawesome/js/all.min.js') ?>"></script>
</body>
</html>