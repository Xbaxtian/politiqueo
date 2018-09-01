<?$this->session->sess_destroy()?>
<section>
	<div class="container">
		<form class="row" id="form-srch" autocomplete="off">
			<div class="input-group col-auto mx-auto my-3">
		        <input class="form-control py-2" type="search" name=algo value="" placeholder="Buscar..." id="example-search-input">
				<span class="input-group-append">
	                <button class="btn btn-outline-dark" type="button" onclick="buscar">
	                    <i class="fa fa-search"></i>
	                </button>
	            </span>
		    </div>
		</form>
		<div class="row">
			<div class="card tarjeta tarjeta-peru col-md-12 col-sm-10 mx-3 mb-3 py-1" id="tablero">
				<div class="row align-items-center py-2 cabecera">
					<div class="col-2"><strong>Cod</strong></div>
					<div class="col-5"><strong>Titulo</strong></div>
					<div class="col-3"><strong>Fecha de debate</strong></div>
					<strong class="ml-1">Opinión</strong>
				</div>


			</div>
		</div>
		<div class="row">
			<div class="col-auto mx-auto my-2">
				<button class="btn btn-red btn-shadow pop-up" href="web/suscripcion">Suscribirse</button>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function(){
		$.post("dictamen/listardictamenes",{},function(data){
			var aux = '';
			for(var i in data){
				aux = '<div class="row item align-items-center py-2">\
					<div class="col-2"><span class="align-middle">'+data[i].codigo+'</span></div>\
					<div class="col-5">'+data[i].titulo+'</div>\
					<div class="col-3">'+data[i].fecha+'</div>\
					<button class="btn btn-dark ml-2"><i class="fas fa-chart-pie"></i></button>\
				</div>';
				$("#tablero").append(aux);
			}
			$("#tablero .item div").on("click",function(){
				window.location.href = "<?=base_url()?>detalleDictamen/?proyecto="+$("span:nth-child(1)",$(this).parent()).html();
			});
			$("#tablero .item button").on("click",function(){
				window.location.href = "<?=base_url()?>estadisticas/?proyecto="+$("span:nth-child(1)",$(this).parent()).html();
			});
		});


		$("#form-srch").submit(function(event) {
			event.preventDefault();
			$.post("web/busqueda", $(this).serialize(), function(data) {
				console.log(data);
				$("#tablero").html('<div class="row align-items-center py-2 cabecera">\
					<div class="col-2"><strong>Cod</strong></div>\
					<div class="col-5"><strong>Titulo</strong></div>\
					<div class="col-3"><strong>Fecha de debate</strong></div>\
					<strong class="ml-1">Opinión</strong>\
				</div>');
				var aux = '';
				for(var i in data){
					aux = '<div class="row item align-items-center py-2">\
						<div class="col-2"><span class="align-middle">'+data[i].codigo+'</span></div>\
						<div class="col-5">'+data[i].titulo+'</div>\
						<div class="col-3">'+data[i].fecha+'</div>\
						<button class="btn btn-dark ml-2"><i class="fas fa-chart-pie"></i></button>\
					</div>';
					$("#tablero").append(aux);
				}
				$("#tablero .item div").on("click",function(){
					window.location.href = "<?=base_url()?>detalleDictamen/?proyecto="+$("span:nth-child(1)",$(this).parent()).html();
				});
				$("#tablero .item button").on("click",function(){
					window.location.href = "<?=base_url()?>estadisticas/?proyecto="+$("span:nth-child(1)",$(this).parent()).html();
				});
			});
		});
	});
	function buscar(){
		$("#form-srch").submit();
	}
</script>
