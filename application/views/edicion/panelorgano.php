<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="col-md-9">
    <div class="main-color-bg">
       <h3 class="card-header">Organos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filtrar Organo...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
            <tr>
                <th>ID Organo</th>
                <th>Descripción</th>
                <th>Titulo</th>
                <th></th>
                <th></th>
            </tr>
            <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
            <tr>
                <td><?php echo $resultado[$i]['id_organo']; ?></td>
                <td><?php echo $resultado[$i]['descripcion']; ?></td>
                <td><?php echo $resultado[$i]['titulo']; ?></td>
                <td><button class="btn pop-up main-color-bg" href="organo/actualizarorgano" data-id="<?php echo $resultado[$i]['id_organo'];?>">Editar</button></td>
                <td><button class="btn pop-up btn-peru eliminar"  href="organo/borrarorgano" data-id="<?php echo $resultado[$i]['id_organo'];?>" >Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                <button class="btn pop-up main-color-bg" href="organo/anadirorgano">Añadir Organo</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript" src="<?php // echo base_url()."js/consultas/organo.js"; ?>"></script> -->
</div>
