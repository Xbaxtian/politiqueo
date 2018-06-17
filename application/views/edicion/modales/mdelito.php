    <div class="modal-header main-color-bg">
        <h4 class="modal-title " id="titleorgano">Añadir Delito</h4>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <?php echo form_open(base_url().'delito/recibirdatos',array('id'=>'form-validado')); ?>
        <div class="form-group row">
            <label for="Delito" class="col-sm-2 col-form-label">Delito</label>
            <div class="col-sm-10">
            <?php
            $delito = array('type'=>'text','class'=>'form-control','name'=>'delito','placeholder'=>'Tipo de delito');
            echo form_input($delito);
            ?>
            <?php echo form_error('delito','<div class="form-error">*', '</div>'); ?>
            </div>
         </div>
         <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn main-color-bg send-form">Guardar</button>
    </div>

<script src="<?php echo base_url()."js/validations.js"; ?>"></script>
