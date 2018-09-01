
<div class="container">
	<br>
	<div  align="CENTER">
	   <label style="font-size:15px" class="titulo"></label>
	</div>
	<div class="card mb-3 tarjeta-peru">
	    <div class="card-body">
	        <!--AQUI VA EL CODIGO GENERADO POR EL SCRIPT-->
	        <div class="" id="cuerpo">

	        </div>
	        <br>
	        <div class="row" align="center">
	            <div class="col-12">
	                <a class="btn btn-red btn-shadow" data-toggle="collapse" href="#valoracion" role="button" aria-expanded="false" aria-controls="collapseExample">
	                    Valorar
	                </a>
	            </div>
	        </div>
	        <br>
	        <div class="collapse" id="valoracion">
	            <div class="row" align="center">
	                <div class="col-12">
	                    <p id="ranking_valor">Regular</p>
	                    <p class="clasificacion" id="ranking">
	                        <input id="radio1" type="radio" name="estrellas" value="5" calificacion="Muy bueno" checked> <label for="radio1">★</label>
	                        <input id="radio2" type="radio" name="estrellas" value="4" calificacion="Bueno" checked>    <label for="radio2">★</label>
	                        <input id="radio3" type="radio" name="estrellas" value="3" calificacion="Regular" checked>  <label for="radio3">★</label>
	                        <input id="radio4" type="radio" name="estrellas" value="2" calificacion="Malo">             <label for="radio4">★</label>
	                        <input id="radio5" type="radio" name="estrellas" value="1" calificacion="Muy malo">         <label for="radio5">★</label>
	                    </p>
	                </div>
	            </div>
	            <div class="row">
	                <label class="col-12"><b>DEJENOS SU OPINIÓN:</b></label>
	            </div>
	            <div class="row">
	                <div class="col-12">
	                    <input type="textarea" name="comentario" id="areacomentario" class="form-control" aria-label="With textarea" value="" placeholder="Comente aquí . . .">
	                </div>
	            </div>
	            <br>
	            <div class="row" align="center">
	                <div class="col-12">
	                    <button id="btnenviar" class="btn btn-secondary" href="">Enviar</button>
	                </div>
	            </div>
	        </div>
	   </div>
	</div>
</div>

<script>
    var puntaje = 3;
    var codigo = "<?= $codigo?>";
	var id;

    $("#ranking input").click(function(){
        var val = $(this).attr("calificacion");
        puntaje = $(this).attr("value");
        console.log(val);
        console.log(puntaje);
        $("#ranking_valor").html(val);
    });
</script>

<script>
	var dni = "<?=$this->session->userdata('dni')?>";
	console.log(dni);
    $("#btnenviar").click(function(){
		if(dni === ''){
			$.post('<?=base_url()?>web/modallogin', function(data){
				$("#myModal .modal-dialog").html(data);
				$('#myModal').modal();
			});
		}
		else{
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
</script>

<script>
    $(document).ready(function(){
        $.post("<?= base_url()?>dictamen/obtenerdictamen",{"idObj":codigo},function(data){
			id = data.resultado[0].id_dictamen;
            $(".titulo").html('<b>'+data.resultado[0].titulo+'</b>');
			var congresistas = ""
			for(var i in data.resultado){
				congresistas = congresistas.concat(data.resultado[i].nombres + " " + data.resultado[i].apellidos+", " );
			}
            var aux = '';
            //codigo = data.resultado[0].codigo;
            aux =   '<div class="row">\
                    <label class="col-12"><b>SUMILLA:</b></label>\
                    </div>\
                    <div class="card">\
                    <label class="col-12 mx-auto py-2" align="justified">'+data.resultado[0].sumilla+'</label>\
                    </div>\
                    <br>';
            $("#cuerpo").append(aux);
            aux =   '<div class="row">\
                    <label class="col-12"><b>PROPUESTA POR:</b></label>\
                    </div>\
                    <div class="card">\
                    <label class="col-12 mx-auto py-2" align="justified">'+congresistas+'</label>\
                    </div>\
                    <br>';
            $("#cuerpo").append(aux);
            aux =   '<div class="row">\
                    <label class="col-12"><b>GRUPO PARLAMENTARIO:</b></label>\
                    </div>\
                    <div class="card">\
                    <label class="col-12 mx-auto py-2" align="justified">'+data.resultado[0].bancada+'</label>\
                    </div>\
                    <br>';
            $("#cuerpo").append(aux);
            aux =   '<div class="row">\
                    <label class="col-12"><b>FECHA DE DEBATE:</b></label>\
                    </div>\
                    <div class="card">\
                    <label class="col-12 py-2" style="font-size:20px" align="center"><b>'+data.resultado[0].fecha+'</b></label>\
                    </div>';
            $("#cuerpo").append(aux);
        });
    });
</script>
