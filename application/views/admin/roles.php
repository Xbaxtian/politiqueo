<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<div class="col-md-9">
     <div class="main-color-bg">
        <h3 class="card-header">Roles</h3>
     </div>
     <?php for ($i=0; $i <count($resultado) ; $i++) {
     if( ($i % 2) == 0) {?>
     <div class="card-group tarjeta">
     <?php } ?>
        <div class="card">
            <div class="card-body">
                    <h2><span aria-hidden="true"></span><?php echo $resultado[$i]['total']; ?> </h2>
                    <h4><?php echo $resultado[$i]['descripcion'];?></h4>
             </div>
        </div>
      <?php if( ( $i % 2) == 1 ){ ?>
      </div>
      <?php } } ?>
      <div class="row justify-content-between offset-md-1">
          <div class="col-md-3">
              <button class="btn main-color-bg">Editar Rol</button>
          </div>
          <div class="col-md-3">
              <button class="btn main-color-bg">Eliminar Rol</button>
          </div>
          <div class="col-md-3">
              <button class="btn main-color-bg" data-toggle="modal" data-target="#addRol" >Añadir Rol</button>
          </div>
      </div>
</div>
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
                              $descripcion = array('type'=>'text','name'=> 'descripcion','placeholder'=>'Descripción','class'=>'form-control');
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
                                              if(($i % 2) == 0){ ?>
                                                  <div class="btn-group btn-group-toggle offset-md-9" data-toggle="buttons">
                                                  <?php }  ?>
                                                      <label class="btn btn-danger main-color-bg"> <?php echo $modulos[$i]['nombre'];
                                                      $checkbox = array('type'=>'checkbox','name'=> 'modulos[]','id'=>'modulos','value'=>$modulos[$i]['id_modulo']);
                                                      echo form_input($checkbox);
                                                      ?>
                                                      </label>
                                              <?php if(($i % 2) == 1){?>
                                                   </div> <?php } ?>
                                              <?php } ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <a href="<?php echo base_url();?>">
                          <?php
                          $submit = array('type'=>'submit','value'=>'Guardar','class'=>'btn main-color-bg');
                          echo form_submit($submit);
                          ?>
                          </a>
                      </div>
                  <?php echo form_close(); ?>
              </div>
          </div>
      </div>
