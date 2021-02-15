<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/fontawesome/js/all.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
<script>
	$(".dataTable").dataTable({
		dom: 'Bfrtip',
		buttons: [
		{
			extend: 'excel',
			exportOptions: {
				columns: [ 0, 1, 2, 3, 4, 5, 6]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [ 0, 1, 2, 3, 4, 5, 6]
			}
		}
		],
		'language':{
			"processing": "Procesando...",
			"lengthMenu": "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"emptyTable": "Ningún dato disponible en esta tabla",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"search": "Buscar:",
			"infoThousands": ",",
			"loadingRecords": "Cargando...",
			"paginate": {
				"first": "Primero",
				"last": "Último",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"aria": {
				"sortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sortDescending": ": Activar para ordenar la columna de manera descendente"
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad",
				"collection": "Colección",
				"colvisRestore": "Restaurar visibilidad",
				"copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
				"copySuccess": {
					"1": "Copiada 1 fila al portapapeles",
					"_": "Copiadas %d fila al portapapeles"
				},
				"copyTitle": "Copiar al portapapeles",
				"csv": "CSV",
				"excel": "Excel",
				"pageLength": {
					"-1": "Mostrar todas las filas",
					"1": "Mostrar 1 fila",
					"_": "Mostrar %d filas"
				},
				"pdf": "PDF",
				"print": "Imprimir"
			},
			"autoFill": {
				"cancel": "Cancelar",
				"fill": "Rellene todas las celdas con <i>%d<\/i>",
				"fillHorizontal": "Rellenar celdas horizontalmente",
				"fillVertical": "Rellenar celdas verticalmentemente"
			},
			"decimal": ",",
			"searchBuilder": {
				"add": "Añadir condición",
				"button": {
					"0": "Constructor de búsqueda",
					"_": "Constructor de búsqueda (%d)"
				},
				"clearAll": "Borrar todo",
				"condition": "Condición",
				"conditions": {
					"date": {
						"after": "Despues",
						"before": "Antes",
						"between": "Entre",
						"empty": "Vacío",
						"equals": "Igual a",
						"not": "No",
						"notBetween": "No entre",
						"notEmpty": "No Vacio"
					},
					"moment": {
						"after": "Despues",
						"before": "Antes",
						"between": "Entre",
						"empty": "Vacío",
						"equals": "Igual a",
						"not": "No",
						"notBetween": "No entre",
						"notEmpty": "No vacio"
					},
					"number": {
						"between": "Entre",
						"empty": "Vacio",
						"equals": "Igual a",
						"gt": "Mayor a",
						"gte": "Mayor o igual a",
						"lt": "Menor que",
						"lte": "Menor o igual que",
						"not": "No",
						"notBetween": "No entre",
						"notEmpty": "No vacío"
					},
					"string": {
						"contains": "Contiene",
						"empty": "Vacío",
						"endsWith": "Termina en",
						"equals": "Igual a",
						"not": "No",
						"notEmpty": "No Vacio",
						"startsWith": "Empieza con"
					}
				},
				"data": "Data",
				"deleteTitle": "Eliminar regla de filtrado",
				"leftTitle": "Criterios anulados",
				"logicAnd": "Y",
				"logicOr": "O",
				"rightTitle": "Criterios de sangría",
				"title": {
					"0": "Constructor de búsqueda",
					"_": "Constructor de búsqueda (%d)"
				},
				"value": "Valor"
			},
			"searchPanes": {
				"clearMessage": "Borrar todo",
				"collapse": {
					"0": "Paneles de búsqueda",
					"_": "Paneles de búsqueda (%d)"
				},
				"count": "{total}",
				"countFiltered": "{shown} ({total})",
				"emptyPanes": "Sin paneles de búsqueda",
				"loadMessage": "Cargando paneles de búsqueda",
				"title": "Filtros Activos - %d"
			},
			"select": {
				"1": "%d fila seleccionada",
				"_": "%d filas seleccionadas",
				"cells": {
					"1": "1 celda seleccionada",
					"_": "$d celdas seleccionadas"
				},
				"columns": {
					"1": "1 columna seleccionada",
					"_": "%d columnas seleccionadas"
				}
			},
			"thousands": "."
		} 
	});
	$(".btnEmpl").click(function(event) {
		var v = $(this).val();
		var id = v.split('?')[0];
		var ci = v.split('?')[1];
		var no = v.split('?')[2];
		var us = v.split('?')[3];
		var te = v.split('?')[4];
		var co = v.split('?')[5];
		var es = v.split('?')[6];
		$("#txtCedula").val(ci);
		$("#txtEmpleado").val(id);
		$("#txtNombre").val(no);
		$("#txtUsuario").val(us);
		$("#txtTelefono").val(te);
		$("#txtCorreo").val(co);
		$("#sltEstado").val(es);
	});
	$(".btnCliente").click(function(event) {
		var v = $(this).val();
		var id = v.split('?')[0];
		var ci = v.split('?')[1];
		var no = v.split('?')[2];
		var di = v.split('?')[3];		
		var es = v.split('?')[4];
		$("#txtCedula").val(ci);
		$("#txtCliente").val(id);
		$("#txtNombre").val(no);
		$("#txtDireccion").val(di);		
		$("#sltEstado").val(es);
	});
	$(".btnProducto").click(function(event) {
		var v = $(this).val();
		var id = v.split('?')[0];
		var no = v.split('?')[1];
		var pc = v.split('?')[2];
		var st = v.split('?')[3];		
		var es = v.split('?')[4];
		var pv = v.split('?')[5];
		var im = v.split('?')[6];
		var co = v.split('?')[7];
		$("#txtNombre").val(no);
		$("#txtProductos").val(id);
		$("#txtPrecioCompra").val(pc);
		$("#txtStock").val(st);		
		$("#sltEstado").val(es);
		$("#txtPrecioVenta").val(pv);
		$("#imagen").html('<img src="<?= base_url() ?>assets/img/productos/'+im+'" style="height:150px">');
		//$("#fileImagen").val(im);
		$("#txtCodigoBarra").val(co);
	});
	$(".btnCaja").click(function(event) {
		var v = $(this).val();
		var id = v.split('?')[0];
		var ma = v.split('?')[2];
		var mc = v.split('?')[4];
		$("#txtCaja").val(id);
		$("#txtMontoApertura").val(ma);
		$("#txtMontoCierre").val(mc);
	});


	var total = 0;
	var cant = 0;
	var i = 0;
	var h = "";
	$("#btnAggProducto").click(function(event) {
		var producto = $("#sltProducto").val();
		var cantidad = $("#txtCantidad").val();
		if (producto!="" && cantidad!="") {
			var idproducto = producto.split('?')[0];
			var nombre = producto.split('?')[1];
			var precio = parseInt(producto.split('?')[2]);
			var codigobarra = producto.split('?')[3];
			total = total + (parseInt(precio) * parseInt(cantidad));
			cant = cant + parseInt(cantidad);
			h+='<tr class='+i+' value='+precio+'?'+cantidad+'>';
			h+='<td> Cod: '+codigobarra+' - '+nombre+'<input type="hidden" name="txtProductoVenta[]" value="'+idproducto+'"></td>';
			h+='<td>'+precio+'<input type="hidden" class="form-control" name="txtPrecioVenta[]" value="'+precio+'"></td>';
			h+='<td>'+cantidad+'<input type="hidden" class="form-control" name="txtCantidadVenta[]" value="'+cantidad+'"></td>';
			h+='<td><button type="button" class="elimVenta btn btn-danger btn-sm" value='+i+'><i class="fas fa-minus"></i></button></td>';
			h+='</tr>';
			$("#lstVenta").html(h);
			$("#totalProducto").html(cant);
			$("#totalVenta").html(total);
			i++;
			$(".elimVenta").click(function(event) {
				h='';
				var v = $(this).val();
				var venta = $('.'+v).attr('value');
				var preciov = venta.split('?')[0];
				var cantidadv = venta.split('?')[1];
				total = total - (parseInt(precio) * parseInt(cantidad));
				cant = cant - parseInt(cantidad);
				$("."+v).remove();
				$("#totalProducto").html(cant);
				$("#totalVenta").html(total);
			});
		} else {
			alert('Debe indicar el producto a agregar y la cantidad');
		}
	});
</script>
</body>
</html>