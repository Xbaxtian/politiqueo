    <div class="modal-header main-color-bg">
        <h4 class="modal-title " id="titleorgano">Añadir Carrera Universitaria</h4>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <?php echo form_open(base_url().'grado/recibirdatos',array('id'=>'form-validado')); ?>
        <div class="form-group row">
            <label for="grado" class="col-sm-2 col-form-label">Grado</label>
            <div class="col-sm-10">
            <?php
            $grado = array('type'=>'text','class'=>'form-control','name'=>'grado','placeholder'=>'Grado Universitario');
            echo form_input($grado);
            ?>
            <?php echo form_error('grado','<div class="form-error">*', '</div>'); ?>
            </div>
         </div>
         <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn main-color-bg send-form">Guardar</button>
    </div>

<script src="<?php echo base_url()."js/validations.js"; ?>"></script>
