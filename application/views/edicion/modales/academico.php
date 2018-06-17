    <h5>Estudios Universitarios o Postgrado</h5>
    <div class="form-group row">
            <label for="gradoP" class="col-sm-2 col-form-label">Grado</label>
            <div class="col-sm-7">
                <select class="form-control" name="gradoP[]" id="sel" >
                  <option name="gradoP[]" value=" ">Grados Academicos</option>

                  <?php for ($i=0; $i <count($grados) ; $i++) { ?>
                              <option name="gradoP[]" value="<?php echo $grados[$i]['id_grado']; ?>"> <?php echo $grados[$i]['nombre']; ?> </option>
                          <?php } ?>
                </select>
            </div>
            <div class="col-sm-3 align-self-center ">
            <button type="button" class="btn btn-peru pop-up btn-sm" href="grado">Añadir Grado</button>
            </div>
     </div>
     <div class="form-group row">
         <label for="carreraP" class="col-sm-2 col-form-label">Carrera</label>
         <div class="col-sm-10">
         <?php
         $carrera = array('type'=>'text','class'=>'form-control','name'=>'carreraP[]','placeholder'=>'Carrera Universitaria','value'=>'');
         echo form_input($carrera);
         ?>
         <?php echo form_error('carreraP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añoinicioP" class="col-sm-2 col-form-label">Fecha de inicio</label>
         <div class="col-sm-10">
         <?php
         $añoinicio = array('type'=>'date','class'=>'form-control','name'=>'añoinicioP[]','placeholder'=>'Año de Inicio','value'=>'');
         echo form_input($añoinicio);
         ?>
         <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añofinalP" class="col-sm-2 col-form-label">Fecha de termino</label>
         <div class="col-sm-10">
         <?php
         $añofinal = array('type'=>'date','class'=>'form-control','name'=>'añofinalP[]','placeholder'=>'Año de Culminación','value'=>'');
         echo form_input($añofinal);
         ?>
         <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
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
