<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Productos
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
								<button type="button" class="btn btn-primary" id="btnAggProducto" data-toggle="modal" data-target="#mdlProductos"><i class="fas fa-plus"></i> Agregar Producto</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Cod. Producto</th>
											<th>Nombre</th>
											<th>Precio Compra</th>
											<th>Precio Venta</th>
											<th>Stock</th>
											<th>Estado</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($productos as $f): ?>
											<tr>
												<td><?= $f->idproducto ?></td>
												<td><?= $f->nombres?></td>
												<td><?= $f->preciocompra ?></td>
												<td><?= $f->precioventa ?></td>
												<td><?= $f->stock?></td>
												<td><?php if ($f->estado=="D"): ?>
												DISPONIBLE <?php else: ?> NO DISPONIBLE
												<?php endif ?></td>
												<td><button type="button" class="btnProducto btn btn-info btn-sm" value="<?= $f->idproducto?>?<?= $f->nombres ?>?<?= $f->preciocompra ?>?<?= $f->stock ?>?<?= $f->estado ?>?<?= $f->precioventa ?>" data-toggle="modal" data-target="#mdlProductos"><i class="fas fa-edit"></i></button></td>
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

<form action="<?= base_url('procesar_datos_producto') ?>" method="post" accept-charset="utf-8">
	<!-- Modal -->
	<div class="modal fade" id="mdlProductos" tabindex="-1" role="dialog" aria-labelledby="mdlProductosTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mdlProductosTitle">Datos Productos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Nombres</label>
							<input type="text" name="txtNombre" id="txtNombre" class="form-control" min="0">
						</div>
						<div class="col-md-4 form-group">
							<label>Precio Compra</label>
							<input type="number" name="txtPrecioCompra" id="txtPrecioCompra" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Precio Venta</label>
							<input type="number" name="txtPrecioVenta" id="txtPrecioVenta" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Stock</label>
							<input type="text" name="txtStock" id="txtStock" class="form-control">
						</div>						
						<div class="col-md-4 form-group">
							<label>Estado</label>
							<select name="sltEstado" id="sltEstado" class="form-control">
								<option value="D">Disponible</option>
								<option value="N">NoDisponible</option>
							</select>
						</div>
						<input type="hidden" name="txtProducto" id="txtProductos" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar Datos</button>
				</div>
			</div>
		</div>
	</div>
</form>

