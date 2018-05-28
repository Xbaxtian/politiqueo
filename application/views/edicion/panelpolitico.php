<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-9">
    <div class="main-color-bg">
       <h3 class="card-header">Politicos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filtrar Politico...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
            <tr>
                <th>ID Politico</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th></th>
                <th></th>
            </tr>
            <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
            <tr>
                <td><?php echo $resultado[$i]['id_politico']; ?></td>
                <td><?php echo $resultado[$i]['nombres']; ?></td>
                <td><?php echo $resultado[$i]['apellidos']; ?></td>
                <td><a class="btn btn-peru" href="">Editar</a></td>
                <td><button class="btn btn-peru eliminar" data-id="<?php echo $resultado[$i]['id_politico']?>" data-toggle="modal" data-target="#modalpolitico" ?>Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                    <a href="<?php echo base_url()."politico/panelregistrar"; ?>"><button class="btn btn-peru" >Añadir Político</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php include('modales/mpolitico.php'); ?>
    <script type="text/javascript" src="<?php echo base_url()."js/consultas/politico.js"?>"></script>
</div>
