<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $titulo ?></title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/datatables.min.css') ?>">
	<style type="text/css" media="screen">
		body{
			background-image: url('./assets/img/fondo.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			background-attachment: fixed;
		}
		.container{
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
		<a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/sois_1.png') ?>" style="height: 50px" alt="SOIS"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('empleados') ?>">Empleados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('clientes') ?>">Clientes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('productos') ?>">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Ventas</a>
				</li>
			</ul>
			<span class="navbar-text">
				<a href="<?= base_url('cerrar_sesion') ?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
			</span>
		</div>
	</nav>