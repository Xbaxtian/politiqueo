    <h5>Caso(s) involucrado(s)</h5>
    <div class="form-group row">
        <label for="delitoP" class="col-sm-2 col-form-label">Grado</label>
        <div class="col-sm-7">
            <select class="form-control" name="delitoP[]" id="sel" >
              <option name="delitoP[]" value=" ">Delitos Registrados</option>
               <?php for ($j=0; $j <count($delitos) ; $j++) { ?>
                      <option name="delitoP[]" value="<?php echo $delitos[$j]['id_delito']; ?>"> <?php echo $delitos[$j]['nombre']; ?> </option>
               <?php } ?>
            </select>
        </div>
        <div class="col-sm-3 align-self-center ">
        <button type="button" class="btn btn-peru pop-up btn-sm" href="delito">Añadir Delito</button>
        </div>
     </div>
     <div class="form-group row">
         <label for="descripciondP" class="col-sm-2 col-form-label">Caso</label>
         <div class="col-sm-10">
         <?php
         $descripciond = array('type'=>'text','class'=>'form-control','name'=>'descripciondP[]','rows'=>5,'placeholder'=>'Descripción del caso de corrupción','value'=>'');
         echo form_textarea($descripciond);
         ?>
         <?php echo form_error('descripciondP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="fechaP" class="col-sm-2 col-form-label">Fecha Registrada</label>
         <div class="col-sm-10">
         <?php
         $fecha = array('type'=>'date','class'=>'form-control','name'=>'fechadP[]','placeholder'=>'Fecha','value'=>'');
         echo form_input($fecha);
         ?>
         <?php echo form_error('fechadP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
    
    <script type="text/javascript">
    $(".pop-up").click(function(){
        var btn = $(this); alert(btn.attr("href"));
        $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
            $("#modal-target .modal-content").html("");
            $("#modal-target .modal-content").html(data);
            $("#modal-pop-up").modal();
        }).fail(function(){
            alert( "Error de red" );
        })
    });
    </script>
