<div class="modal-content">
	<div class="modal-header" style="">
		<h5 class="modal-title">Ingrese DNI</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body tarjeta">
		<form id="form-login" action="<?=base_url()?>web/login" method="post">
			<div class="form-group">
				<label for="dni"><b>DNI</b></label>
				<input type="number" min="9999999" max="99999999" class="form-control" name="dni" id="dni" placeholder="Ingrese su dni" oninvalid="invalid()" required>
			</div>
			<div class="form-group text-center">
				<input type="submit" class="btn btn-red" value="Ingresar">
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#form-login").submit(function(event) {
			event.preventDefault();
			$.post($(this).attr('action'), $(this).serialize(), function(data){
				if(data.result === "success"){
					$("#myModal").modal('hide');
					dni = data.dni;
					$.post("<?= base_url()?>web/recibircalificacion",{"dni": dni, "codigo": id, "puntaje": puntaje, "comentario": $("#areacomentario").val()},function(data){
			            if(data.result == "success"){
			                window.location.href = "<?= base_url()?>estadisticas/?proyecto="+codigo;
			            }
						else{
							alert('Ya comento esta ley');
						}
			        });
				}
			});
		});
	});
</script>
