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
                <td><a class="btn main-color-bg" href="">Editar</a></td>
                <td><button class="btn btn-peru eliminar" data-id="<?php echo $resultado[$i]['id_organo']?>" data-toggle="modal" data-target="#modalorgano" ?>Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                <a href="<?php echo base_url()."organo/panelregistrar"; ?>"><button class="btn main-color-bg">Añadir Organo</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php include('modales/morgano.php'); ?>
    <script type="text/javascript" src="<?php echo base_url()."js/consultas/organo.js"; ?>"></script>
</div>
