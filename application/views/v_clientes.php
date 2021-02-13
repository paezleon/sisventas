<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Clientes
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('alerta')): ?>
						<div class="alert alert-warning" role="alert">
							<strong>Atención!</strong> <?= $this->session->flashdata('alerta'); ?>.
						</div>
					<?php endif ?>
					<?php if ($this->session->flashdata('correcto')): ?>
						<div class="alert alert-success" role="alert">
							<strong>Excelente!</strong> <?= $this->session->flashdata('correcto'); ?>.
						</div>
					<?php endif ?>
					<div class="row">
						<div class="col-md-12 text-right">
							<div class="form-group">
								<button type="button" class="btn btn-primary" id="btnAggCliente" data-toggle="modal" data-target="#mdlClientes"><i class="fas fa-plus"></i> Agregar Cliente</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Cod. Cliente</th>
											<th>Cédula</th>
											<th>Nombre y Apellido</th>
											<th>Dirección</th>
											<th>Estado</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($clientes as $f): ?>
											<tr>
												<td><?= $f->idcliente ?></td>
												<td><?= $f->ci ?></td>
												<td><?= $f->nombres ?></td>
												<td><?= $f->direccion ?></td>
												<td><?php if ($f->estado=="A"): ?>
												ACTIVO <?php else: ?> INACTIVO
												<?php endif ?></td>
												<td><button type="button" class="btnCliente btn btn-info btn-sm" value="<?= $f->idcliente?>?<?= $f->ci ?>?<?= $f->nombres ?>?<?= $f->direccion ?>?<?= $f->estado ?>" data-toggle="modal" data-target="#mdlClientes"><i class="fas fa-edit"></i></button></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form action="<?= base_url('procesar_datos_cliente') ?>" method="post" accept-charset="utf-8">
	<!-- Modal -->
	<div class="modal fade" id="mdlClientes" tabindex="-1" role="dialog" aria-labelledby="mdlClientesTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mdlClientesTitle">Datos Cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Cédula</label>
							<input type="number" name="txtCedula" id="txtCedula" class="form-control" min="0">
						</div>
						<div class="col-md-4 form-group">
							<label>Nombres y Apellidos</label>
							<input type="text" name="txtNombre" id="txtNombre" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Dirección</label>
							<input type="text" name="txtDireccion" id="txtDireccion" class="form-control">
						</div>						
						<div class="col-md-4 form-group">
							<label>Estado</label>
							<select name="sltEstado" id="sltEstado" class="form-control">
								<option value="A">Activo</option>
								<option value="I">Inactivo</option>
							</select>
						</div>
						<input type="hidden" name="txtCliente" id="txtCliente" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Datos</button>
				</div>
			</div>
		</div>
	</div>
</form>

