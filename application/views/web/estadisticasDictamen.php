<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<div class="container">
	<section>
		<br>
		<div class="" align="CENTER">
		   <label style="font-size:15px" class="titulo"></label>
		</div>
		<br>
		<ul class="nav nav-tabs nav-fill">
			<li class="nav-item">
				<a id="tab1" class="nav-link active" style="font-size:20px;"><b>Estadísticas</b></a>
			</li>
			<li class="nav-item">
				<a id="tab2" class="nav-link" style="font-size:20px;"><b>Opiniones</b></a>
			</li>
		</ul>
		<div class="row" id="grafico">
			<div class="col-12">
				<form class="row" id="form-srch" autocomplete="off">
					<div class="input-group col-auto mx-auto my-3">
				        <input class="form-control py-2" type="search" value="" placeholder="Busca tu region..." id="example-search-input">
						<span class="input-group-append">
			                <button class="btn btn-outline-dark" type="button" onclick="filtrar()">
			                    <i class="fa fa-search"></i>
			                </button>
			            </span>
				    </div>
				</form>
				<div class="car mb-3 tarjeta">
					<div class="card-body">
						<div class="row">
							<div class="col-auto mx-auto">
								<canvas id="myChart" height="400"></canvas>
							</div>
						</div>
						<div class="row mx-auto">
							<div class="col-auto mx-auto">
								<ul class="list-group m-2">
	  								<li class="aprueba" align="center">
										<p align="center">Lo aprueban el <span style="font-size: 25px" id="porca"></span></p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="display:none;" class="row" id="opiniones">
			<div class="col-12">
				<div class="card mb-3 tarjeta">
					<div class="card-body">
						<div class="row mb-3">
							<!-- AQUI METEREMOS LOS EJEMPLOS DE LOS COMENTARIOS-->
							<div id="comentan" class="col-12 mx-auto">

							</div>
							<!-- AQUI ACABAN LOS EJEMPLOS DE LOS COMENTARIOS-->
						</div>
						<div class="row mx-auto">
							<div class="col-12 mx-auto" align="center">
								<button id="btncargar" class="btn btn-dark" type="button" name="button">Cargar mas comentarios</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>

<script>
	var codigo = "<?= $codigo?>";
	var id;
	var porcentajea, porcentajeb, porcentajec;
	var porcentaje1, porcentaje2, porcentaje3, porcentaje4, porcentaje5;
	var total;
	var inc = 10;

	$(document).ready(function(){
		$.post("<?= base_url()?>web/enviarpuntuaciones",{"idObj":codigo},function(data){
			var ctx = document.getElementById("myChart").getContext('2d');
			console.log(data);
			var djson = {
				type: 'pie',
				data: {
					labels: ["Muy malo", "Malo", "Regular", "Bueno", "Muy bueno"],
					datasets: [{
						data: 	[	0,
									0,
									0,
									0,
									0],
						backgroundColor: [
							'rgb(240, 72, 68)',//muy malo
							'rgb(255, 168, 71)',//malo
							'rgb(224, 222, 219)',//regular
							'rgb(16, 120, 176)',//bueno
							'rgb(33, 186, 92)'//muy bueno
						]
					}]
				},
				options: {
					legend: {
			            labels: {
			                fontColor: 'black',
							fontSize: 16
			            }
			        }
				}
			}
			for(var i in data.puntuaciones){
				var aux = data.puntuaciones[i].calificacion-1;
				djson.data.datasets[0].data[aux] =  data.puntuaciones[i].cantidad;
			}
			var myChart = new Chart(ctx, djson);
			total = parseInt(djson.data.datasets[0].data[0]) +
					parseInt(djson.data.datasets[0].data[1]) +
					parseInt(djson.data.datasets[0].data[2]) +
					parseInt(djson.data.datasets[0].data[3]) +
					parseInt(djson.data.datasets[0].data[4]);
			//console.log(total);
			porcentajea = Math.round(100*(parseInt(djson.data.datasets[0].data[3]) + parseInt(djson.data.datasets[0].data[4]))/ total);
			porcentajeb = Math.round(100*(parseInt(djson.data.datasets[0].data[1]) + parseInt(djson.data.datasets[0].data[2]))/ total);
			porcentajec = Math.round(100*(parseInt(djson.data.datasets[0].data[3]))/ total);
			porcentaje1 = Math.round(100*(parseInt(djson.data.datasets[0].data[1]))/ total);
			porcentaje2 = Math.round(100*(parseInt(djson.data.datasets[0].data[2]))/ total);
			porcentaje3 = Math.round(100*(parseInt(djson.data.datasets[0].data[3]))/ total);
			porcentaje4 = Math.round(100*(parseInt(djson.data.datasets[0].data[4]))/ total);
			porcentaje5 = Math.round(100*(parseInt(djson.data.datasets[0].data[5]))/ total);
			//console.log(porcentaje);
			$("#porca").html('<b>'+porcentajea+'%</b>');
			//$("#porcb").html('<b>'+porcentajeb+'%</b>');
		});
	});
</script>

<script>
	$(document).ready(function(){
		$.post("<?= base_url()?>dictamen/obtenerdictamen",{"idObj":codigo},function(data){
			id = data.resultado[0].id_dictamen;
			$(".titulo").html('<b>'+data.resultado[0].titulo+'</b>');
		});
	});

	$(document).ready(function(){
		$.post("<?= base_url()?>web/enviarcomentarios",{"idObj":codigo},function(data){
			console.log(data);
			var aux;
			for(var i = 0; i<inc ; i++){
				if(data.comentarios[i] === undefined){
					break;
				}
				if(data.comentarios[i].comentario!=""){
					aux = 	'<div class="row-auto mx-auto mb-2" >\
							<div class="card comentario">\
							<div class="card-body" align="justify">'+
							data.comentarios[i].comentario
							+'</div>\
							</div>\
							</div>';
					$("#comentan").append(aux);
				}
			}
		});
	});

	$("#btncargar").click(function(){
		$.post("<?= base_url()?>web/enviarcomentarios",{"idObj":codigo},function(data){
			console.log(data);
			var aux;
			for(var i = inc; i < inc+10 ; i++){
				if(data.comentarios[i].comentario!==""){
					aux = 	'<div class="row-auto mx-auto mb-2" >\
							<div class="card comentario">\
							<div class="card-body" align="justify">'+
							data.comentarios[i].comentario
							+'</div>\
							</div>\
							</div>';
					$("#comentan").append(aux);
				}
			}
		});
		inc=inc+10;
	});
</script>

<script>
	$("#tab1").click(function(){
		$('#grafico').show();
		$('#opiniones').hide();
		$('#tab2').removeClass(['active']);
		$('#tab1').addClass(['active']);
	});
	$("#tab2").click(function(){
		$('#grafico').hide();
		$('#opiniones').show();
		$('#tab1').removeClass(['active']);
		$('#tab2').addClass(['active']);
	});

</script>

<script>
	$(document).ready(function() {
		$("#form-srch").submit(function(event) {
			event.preventDefault();
			console.log($("#example-search-input").val());
			$.post("<?= base_url()?>web/filtrar", {"id": id, "algo": $("#example-search-input").val()}, function(data) {
				var ctx = document.getElementById("myChart").getContext('2d');
				$("#myChart").html('');
				console.log(data);
				var djson = {
					type: 'pie',
					data: {
						labels: ["Muy malo", "Malo", "Regular", "Bueno", "Muy bueno"],
						datasets: [{
							data: 	[	0,
										0,
										0,
										0,
										0],
							backgroundColor: [
								'rgb(240, 72, 68)',//muy malo
								'rgb(255, 168, 71)',//malo
								'rgb(224, 222, 219)',//regular
								'rgb(16, 120, 176)',//bueno
								'rgb(33, 186, 92)'//muy bueno
							]
						}]
					},
					options: {
						legend: {
				            labels: {
				                fontColor: 'black',
								fontSize: 16
				            }
				        }
					}
				}
				for(var i in data[1]){
					var aux = data[1][i].calificacion-1;
					djson.data.datasets[0].data[aux] =  data[1][i].cantidad;
				}
				var myChart = new Chart(ctx, djson);
				total = parseInt(djson.data.datasets[0].data[0]) +
						parseInt(djson.data.datasets[0].data[1]) +
						parseInt(djson.data.datasets[0].data[2]) +
						parseInt(djson.data.datasets[0].data[3]) +
						parseInt(djson.data.datasets[0].data[4]);
				//console.log(total);
				porcentajea = Math.round(100*(parseInt(djson.data.datasets[0].data[3]) + parseInt(djson.data.datasets[0].data[4]))/ total);
				porcentajeb = Math.round(100*(parseInt(djson.data.datasets[0].data[1]) + parseInt(djson.data.datasets[0].data[2]))/ total);
				porcentajec = Math.round(100*(parseInt(djson.data.datasets[0].data[3]))/ total);
				porcentaje1 = Math.round(100*(parseInt(djson.data.datasets[0].data[1]))/ total);
				porcentaje2 = Math.round(100*(parseInt(djson.data.datasets[0].data[2]))/ total);
				porcentaje3 = Math.round(100*(parseInt(djson.data.datasets[0].data[3]))/ total);
				porcentaje4 = Math.round(100*(parseInt(djson.data.datasets[0].data[4]))/ total);
				porcentaje5 = Math.round(100*(parseInt(djson.data.datasets[0].data[5]))/ total);
				//console.log(porcentaje);
				$("#porca").html('<b>'+porcentajea+'%</b>');
				//$("#porcb").html('<b>'+porcentajeb+'%</b>');

			});
		});
	});

	function filtrar(){
		$("#form-srch").submit();
	}
</script>
