<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Bienvenido <?= $this->session->userdata('nomEmpleado'); ?>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 form-group">
							<a href="<?= base_url('empleados') ?>" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block"><h2><i class="fas fa-users"></i> | EMPLEADOS</h2></button></a>
						</div>
						<div class="col-md-6 form-group">
							<a href="<?= base_url('clientes') ?>" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block"><h2><i class="fas fa-people-carry"></i> | CLIENTES</h2></button></a>
						</div>
						<div class="col-md-6 form-group">
							<a href="<?= base_url('productos') ?>" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block"><h2><i class="fas fa-boxes"></i> | PRODUCTOS</h2></button></a>
						</div>
						<div class="col-md-6 form-group">
							<a href="<?= base_url('nuevaventa') ?>" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block"><h2><i class="fas fa-money-bill-wave"></i> | VENTAS</h2></button></a>
						</div>
						<div class="col-md-6 form-group">
							<a href="<?= base_url('cajas') ?>" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block"><h2><i class="fas fa-cash-register"></i> |CAJAS</h2></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>