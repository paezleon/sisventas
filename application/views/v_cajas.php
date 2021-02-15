<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Cajas
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
								<button type="button" class="btn btn-primary" id="btnAggCaja" data-toggle="modal" data-target="#mdlCajas"><i class="fas fa-plus"></i> Apertura de Caja</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="dataTable table table-bordered">
									<thead>
										<tr>
											<th>Cod. Caja</th>
											<th>Fecha Apertura</th>
											<th>Monto Apertura</th>
											<th>Fecha Cierre</th>
											<th>Monto Cierre</th>
											<th>Empleado</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($cajas as $f): ?>
											<tr>
												<td><?= $f->idcaja ?></td>
												<td><?= $f->fechaApertura ?></td>
												<td><?= str_replace(',', '.', number_format($f->montoApertura)) ?> Gs.</td>
												<td><?= $f->fechaCierre ?></td>
												<td><?= str_replace(',', '.', number_format($f->montoCierre)) ?> Gs.</td>
												<td><?= $f->nombres ?></td>
												<td><button type="button" class="btnCaja btn btn-info btn-sm" value="<?= $f->idcaja?>?<?= $f->fechaApertura ?>?<?= $f->montoApertura ?>?<?= $f->fechaCierre ?>?<?= $f->montoCierre ?>?<?= $f->idempleado ?>" data-toggle="modal" data-target="#mdlCajas"><i class="fas fa-edit"></i></button></td>
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

<form action="<?= base_url('procesar_datos_caja') ?>" method="post" accept-charset="utf-8">
	<!-- Modal -->
	<div class="modal fade" id="mdlCajas" tabindex="-1" role="dialog" aria-labelledby="mdlCajasTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mdlCajasTitle">Datos Caja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Monto Apertura</label>
							<input type="number" name="txtMontoApertura" id="txtMontoApertura" class="form-control" min="0">
						</div>
						<div class="col-md-4 form-group">
							<label>Monto Cierre</label>
							<input type="number" name="txtMontoCierre" id="txtMontoCierre" class="form-control" min="0">
						</div>						
						<input type="hidden" name="txtCaja" id="txtCaja" value="">
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

