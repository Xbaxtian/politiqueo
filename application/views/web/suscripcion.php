<div class="modal-content">
	<div class="modal-header" style="">
		<h5 class="modal-title">Suscripción</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body tarjeta">
		<p>Seleccione sus preferencias y las leyes le llegaran a su correo completamente GRATIS</p>
		<form id="form-suscribcion">
			<div class="form-group">
				<label for="email"><b>Correo electrónico</b></label>
				<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico">
			</div>
			<div class="form-group">
				<label for="preferencias"><b>Preferencias</b></label>
				<div class="card" id="card-comisiones">
					<div class="card-body">

					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-red" id="btn-suscribir" onclick="suscribir()">Guardar</button>
	</div>
</div>

<script>
	$(document).ready(function() {
		$.post('web/listarcomisiones', {}, function(data) {
			console.log(data);
			var aux = '';
			for(var i in data){
				aux = '<div class="row align-items-center">\
					<div class="col-8">'+data[i].descripcion+'</div>\
					<label class="switch">\
						<input class="form-check-input" type="checkbox" name="comisiones[]" value="'+data[i].id_comision+'">\
						<span class="slider round"></span>\
					</label>\
				</div><hr>'
				$("#card-comisiones .card-body").append(aux);
			}
		});
	});
	function suscribir(){
		$(".modal-body").html(' ');
		$(".modal-body").html("<p>Se ha suscrito correctamente su correo, en unos momentos le llegara un correo de confirmacion, revise su bandeja de spam por favor</p>");
		$("#btn-suscribir").hide(0,function(){
			$("button",$(this).parent()).removeClass('btn-secondary');
			$("button",$(this).parent()).addClass('btn-red');
			$("button",$(this).parent()).html('Aceptar');
		});
	}
</script>
