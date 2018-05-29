
 <div class="modal-header main-color-bg">
     <h4 class="modal-title " id="myModalLabel">Añadir Usuario</h4>
     <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 </div>
 <div class="modal-body">
     <?php echo validation_errors(); ?>
     <?php echo form_open('usuarios/recibirdatos', array("id"=>"form-usuario")); ?>
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
     <button type="button" class="btn main-color-bg send-form">Guardar</button>
 </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.send-form').click(function(){
                var form = $("#form-usuario");
                $.post(form.attr('action'), form.serialize(), function(data){
                    if(data.result == "success"){
                        $('#modal-pop-up').modal('hide');
                    }
                    else {
                        $("#modal-target .modal-content").html(data);
                    }
                }).fail(function(){
                    alert( "Error en la red" );
                });
            }
        );
    });

</script>
