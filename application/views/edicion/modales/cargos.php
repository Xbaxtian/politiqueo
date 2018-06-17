    <h5>Cargo(s) actual(es) u ocupado(s)</h5>
    <div class="form-group row">
        <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
        <div class="col-sm-7">
            <select class="form-control" name="cargoP[]" id="sel" >
              <option name="cargoP[]" value=" ">Cargos Registrados</option>
              <?php for ($i=0; $i <count($cargos) ; $i++) { ?>
                   <option name="cargoP[]" value="<?php echo $cargos[$i]['id_cargo']; ?>"><?php echo $cargos[$i]['descripcion'] ?></option>
              <?php } ?>
            </select>
        <?php echo form_error('cargoP','<div class="form-error">*', '</div>'); ?>
        </div>
        <div class="col-sm-3 align-self-center ">
        <button type="button" class="btn btn-peru pop-up btn-sm" href="<?php echo base_url()."cargo"; ?>">Añadir Cargo</button>
        </div>
    </div>
     <div class="form-group row">
         <label for="añoiniciocP" class="col-sm-2 col-form-label">Fecha de inicio</label>
         <div class="col-sm-10">
         <?php
         $añoinicio = array('type'=>'date','class'=>'form-control','name'=>'añoiniciocP[]','placeholder'=>'Año de Inicio','value'=>'');
         echo form_input($añoinicio);
         ?>
         <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añofinalcP" class="col-sm-2 col-form-label">Fecha de termino</label>
         <div class="col-sm-10">
         <?php
         $añofinal = array('type'=>'date','class'=>'form-control','name'=>'añofinalcP[]','placeholder'=>'Año de Culminación','value'=>'');
         echo form_input($añofinal);
         ?>
         <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
    </div>
    
    <script type="text/javascript">
    $(".pop-up").click(function(){
        var btn = $(this);;
        $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
            $("#modal-target .modal-content").html("");
            $("#modal-target .modal-content").html(data);
            $("#modal-pop-up").modal();
        }).fail(function(){
            alert( "Error de red" );
        })
    });
    </script>
