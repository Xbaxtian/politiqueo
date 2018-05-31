
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Añadir Rol</h4>
    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <?php echo form_open("rol/recibirdatos", array("id"=>"form-validado")); ?>
    <div class="form-group">
        <label>Descripción</label>
        <?php
        $descripcion = array('type'=>'text','name'=> 'descripcion','id'=>'descripcion','placeholder'=>'Descripción','class'=>'form-control');
        echo form_input($descripcion);
        ?>
        <?php echo form_error('descripcion','<div class="form-error">*', '</div>'); ?>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
            <label>Modulos Asignados</label><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $modulos = getModulos();
                for ($i=0; $i < count($modulos); $i++) {
                    if(($i % 3) == 0){ ?>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <?php }  ?>
                    <label class="btn btn-danger main-color-bg">
                    <?php echo $modulos[$i]['nombre'];
                    $checkbox = array('type'=>'checkbox','name'=> 'modulos[]','id'=>'modulos','value'=>$modulos[$i]['id_modulo']);
                    echo form_input($checkbox);
                    ?>
                    </label>&nbsp
                    <?php if(($i % 3) == 2){?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php echo form_error('modulos[]','<div class="form-error">*', '</div>'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="modal-footer">
    <button type="button" id="act" class="btn btn-default">Actualizar</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn main-color-bg send-form">Guardar</button>
</div>
<script src="js/validations.js"></script>
