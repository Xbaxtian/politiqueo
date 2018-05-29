<form id="confirmacion">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header main-color-bg">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>¿Estás seguro de borrar a este usuario?</h3>
            <input type="hidden" id="idusuario" name="idusuario" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-peru" data-dismiss="modal">Cancelar</button>
            <button id="delete"type="submit" class="btn btn-peru">Borrar</button>
          </div>
        </div>
      </div>
    </div>
</form>






 <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUser">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
            <?php echo form_open(base_url().'usuarios/recibirdatos'); ?>
                 <div class="modal-header main-color-bg">
                     <h4 class="modal-title " id="myModalLabel">Añadir Usuario</h4>
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

                          <div class="row offset-1">
                              <div class="col-md-4 ">
                                  <?php
                                  $roles = getRol();
                                  for ($i=0; $i < count($roles); $i++) {
                                      if(($i % 3) == 0){?>
                                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                 <?php } ?>

                                     <label class="btn main-color-bg btn-danger">
                                     <?php echo $roles[$i]['descripcion'];
                                         $radiobutton = array('type'=>'radio','name'=> 'rol','value'=>$roles[$i]['id_rol']);
                                         echo form_input($radiobutton);
                                     ?>
                                    </label>&nbsp&nbsp
                                    <?php if(($i % 3) == 2){ ?>
                                 </div>
                             <?php }} ?>
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
