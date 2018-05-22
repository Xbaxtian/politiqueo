<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <div class="col-md-9">
     <div class="main-color-bg">
        <h3 class="card-header">Usuarios</h3>
     </div>

     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                 <input class="form-control" type="text" placeholder="Filtrar Usuarios...">
                 </div>
             </div>
         <br><!-- for -->
         <table class="table table-striped table-hover">
         <tr>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th></th>
         </tr>
         <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
         <tr>
             <td><?php echo $resultado[$i]['nombres']; ?></td>
             <td><?php echo $resultado[$i]['apellidos']; ?></td>
             <td><?php echo $resultado[$i]['correo']; ?></td>
             <td><a class="btn main-color-bg" href="#">Borrar</a></td>
         </tr>
         <?php } ?>
         </table>
         <div class="row">
             <div class="col-md-12">
                 <button class="btn main-color-bg float-right" data-toggle="modal" data-target="#addUser" >Añadir Usuario</button>
             </div>
         </div>

         </div>
      </div>
      <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUser">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <?php echo form_open(base_url().'usuarios/recibirdatos_usuario'); ?>
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Añadir Usuario</h4>
                          <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">

                          <div class="form-group">
                              <label>ID Usuario</label>
                              <?php
                              $id = array('type'=>'text','name'=> 'id','placeholder'=>'ID Usuario','class'=>'form-control');
                              echo form_input($id);
                              ?>
                          </div>
                          <div class="form-group">

                                   <label>Rol</label><br>

                               <div class="row">
                                   <div class="col-md-4 justify-content-between">
                                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <?php
                                          $roles = getRol();
                                          for ($i=0; $i < count($roles); $i++) { ?>
                                          <label class="btn main-color-bg btn-danger">
                                          <?php echo $roles[$i]['descripcion'];
                                              $radiobutton = array('type'=>'radio','name'=> 'rol','id'=>'rol','value'=>$roles[$i]['id_rol']);
                                              echo form_input($radiobutton);
                                          ?>
                                          </label> <?php } ?>
                                      </div>
                                   </div>
                                </div>
                          </div>
                          <div class="form-group">
                              <label>Nombres</label>
                              <?php
                              $nombres = array('type'=>'text','name'=> 'nombres','placeholder'=>'Nombres','class'=>'form-control');
                              echo form_input($nombres);
                              ?>
                          </div>
                          <div class="form-group">
                              <label>Apellidos</label>
                              <?php
                              $apellidos = array('type'=>'text','name'=> 'apellidos','placeholder'=>'Apellidos','class'=>'form-control');
                              echo form_input($apellidos);
                              ?>
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <?php
                              $pass = array('type'=>'password','name'=> 'pass','placeholder'=>'Password','class'=>'form-control');
                              echo form_input($pass);
                              ?>
                          </div>
                          <div class="form-group">
                              <label>Correo</label>
                              <?php
                              $correo = array('type'=>'email','name'=> 'correo','placeholder'=>'Correo','class'=>'form-control');
                              echo form_input($correo);
                              ?>
                          </div>

                      </div>
                      <div class="modal-footer">
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
</div>
