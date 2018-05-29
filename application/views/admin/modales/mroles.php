<form id="confirmacion">
    <div class="modal fade" id="modalrol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header main-color-bg">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>¿Estás seguro de borrar este rol?</h3>
            <input type="hidden" id="idrol" name="idrol" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-peru" data-dismiss="modal">Cancelar</button>
            <button id="delete" type="submit" class="btn btn-peru">Borrar</button>
          </div>
        </div>
      </div>
    </div>
</form>

<form id="modalmayor">
    <div class="modal fade" id="addRol" tabindex="-1" role="dialog" aria-labelledby="addUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <?php echo form_open(base_url()."rol/recibirdatos"); ?>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Añadir Rol</h4>
                        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Descripción</label>
                            <?php
                            $descripcion = array('type'=>'text','name'=> 'descripcion','id'=>'descripcion','placeholder'=>'Descripción','class'=>'form-control');
                            echo form_input($descripcion);
                            ?>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Modulos Asignados</label><br>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                      <?php $modulos = getModulos();
                                        for ($i=0; $i < count($modulos); $i++) {
                                            if(($i % 3) == 0){ ?>
                                                <div class="btn-group btn-group-toggle offset-md-9" data-toggle="buttons">
                                                <?php }  ?>
                                                    <label class="btn btn-danger main-color-bg"> <?php echo $modulos[$i]['nombre'];
                                                    $checkbox = array('type'=>'checkbox','name'=> 'modulos[]','id'=>'modulos','value'=>$modulos[$i]['id_modulo']);
                                                    echo form_input($checkbox);
                                                    ?>
                                                </label>&nbsp
                                            <?php if(($i % 3) == 2){?>
                                                 </div> <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" id="act" class="btn btn-default">Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <?php
                        $submit = array('type'=>'submit','value'=>'Guardar','class'=>'btn main-color-bg');
                        echo form_submit($submit);
                        ?>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</form>
