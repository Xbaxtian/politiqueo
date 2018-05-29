<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include('modales/musuarios.php');
 ?>
 <div class="col-md-9">
     <div class="main-color-bg">
        <h3 class="card-header">Usuarios</h3>
     </div>

     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                 <input id="bsq" class="form-control" type="text" placeholder="Filtrar Usuarios...">
                 </div>
             </div>
             <script type="text/javascript" src="<?php echo base_url().'js/consultas/usuarios.js' ?>"> </script>
             <br><!-- for -->
             <table id="tablausuarios" class="table table-striped table-hover">
             <tr>
                 <th>ID Usuario</th>
                 <th>Nombres</th>
                 <th>Apellidos</th>
                 <th>Correo</th>
                 <th></th>
             </tr>
             <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
             <tr>
                 <td class="tarjeta"><?php echo $resultado[$i]['id_usuario']; ?></td>
                 <td><?php echo $resultado[$i]['nombres']; ?></td>
                 <td><?php echo $resultado[$i]['apellidos']; ?></td>
                 <td><?php echo $resultado[$i]['correo']; ?></td>
                 <td> <button class="btn btn-peru eliminar" data-id="<?php echo $resultado[$i]['id_usuario']?>" data-toggle="modal" data-target="#myModal" ?>Borrar</button></td>
             </tr>
             <?php } ?>
             </table>
             <div class="row">
                 <div class="col-md-12">
                     <button class="btn pop-up main-color-bg float-right" href="usuarios/anadirUsuario" >Añadir Usuario</button>
                 </div>
             </div>
        </div>
      </div>
</div>
