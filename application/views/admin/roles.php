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
                        <button class="btn main-color-bg" data-id="<?php echo $resultado[$i]['id_rol']?>" data-descripcion="<?php echo $resultado[$i]['descripcion'] ?>" data-toggle="modal" data-target="#addRol">Editar Rol</button>
                        <button class="btn btn-peru eliminar" data-id="<?php echo $resultado[$i]['id_rol']?>" data-toggle="modal" data-target="#modalrol">Eliminar Rol</button>
                </div>
            </div>

          <?php if( ( $i % 2) == 1 ){ ?>
          </div>
          <?php } } ?>
          <div class="row justify-content-center">
              <div class="col-md-3">
                  <button class="btn pop-up main-color-bg" href="rol/anadirRol">Añadir Rol</button>
              </div>
          </div>
      <script type="text/javascript" src="<?php echo base_url()."js/consultas/roles.js";?>"></script>
</div>
