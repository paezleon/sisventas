<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Ventas
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
								<button type="button" class="btn btn-primary" id="btnAggVentas" data-toggle="modal" data-target="#mdlVentas"><i class="fas fa-plus"></i> Registrar Ventas</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										
									</thead>
									<tbody>
										
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

<form action="<?= base_url('procesar_datos_ventas') ?>" method="post" accept-charset="utf-8">
	<!-- Modal -->
	<div class="modal fade" id="mdlVentas" tabindex="-1" role="dialog" aria-labelledby="mdlVentasTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mdlVentasTitle">Datos Caja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
											
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

