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
								<table class="dataTable table table-bordered">
									<thead>
										<tr>
											<th>Nro. Venta</th>
											<th>Caja Utilizada</th>
											<th>Nro. de Factura</th>
											<th>Fecha Venta</th>
											<th>Monto</th>
											<th>Cantidad</th>
											<th>Cliente</th>
											<th>Empleado</th>
											<th>Estado</th>
											<th>Acción</th>
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
		</div>
	</div>
</div>

<form action="<?= base_url('procesar_datos_venta') ?>" method="post" accept-charset="utf-8">
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
						<div class="col-md-3">
							<div class="form-group">
								<label>Clientes</label>
								<select name="sltCliente" id="sltCliente" class="form-control">
									<?php if (!empty($clientes)): ?>
										<?php foreach ($clientes as $c): ?>
											<option value="<?= $c->idcliente ?>"><?= $c->nombres ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Caja</label>
								<select name="sltCaja" id="sltCaja" class="form-control">
									<?php if (!empty($cajas)): ?>
										<?php foreach ($cajas as $c): ?>
											<option value="<?= $c->idcaja ?>">Nro. de Caja <?= $c->idcaja ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Producto</label>
								<select name="sltProducto" id="sltProducto" class="form-control">
									<option value="">Seleccione una opción</option>
									<?php if (!empty($productos)): ?>
										<?php foreach ($productos as $p): ?>
											<option value="<?= $p->idproducto ?>?<?= $p->nombres ?>?<?= $p->precioventa ?>?<?= $p->codigobarra ?>">Cod: <?= $p->codigobarra ?> - <?= $p->nombres ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Cantidad</label>
								<input type="number" name="txtCantidad" id="txtCantidad" class="form-control" min="0">
							</div>
						</div>
						<div class="col-md-12" style="margin-top: auto;">
							<div class="form-group">
								<button type="button" class="btn btn-info btn-block" id="btnAggProducto"><i class="fas fa-plus"></i> Agregar</button>
							</div>
						</div>					
						<input type="hidden" name="txtCaja" id="txtCaja" value="">
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3>Detalles de venta</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Producto</th>
											<th>Precio</th>
											<th>Cantidad</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody id="lstVenta">
										<tr>
											<td colspan="4" class="text-center"><h4>SIN PRODUCTOS</h4></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2">CANTIDAD: <span id="totalProducto">0</span></td>
											<td colspan="2">TOTAL: <span id="totalVenta">0</span></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
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

