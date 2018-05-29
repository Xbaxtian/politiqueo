<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<div class="col-md-9">
    <div class="main-color-bg">
       <h3 class="card-header">Partidos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filtrar Partidos...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
            <tr>
                <th>ID Partido</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
            </tr>
            <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
            <tr>
                <td><?php echo $resultado[$i]['id_partido']; ?></td>
                <td><?php echo $resultado[$i]['nombre']; ?></td>
                <td><a class="btn main-color-bg" href="">Editar</a></td>
                <td><button class="btn btn-peru eliminar" data-id="<?php echo $resultado[$i]['id_partido']?>" data-toggle="modal" data-target="#modalpartido" ?>Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                    <a href="<?php echo base_url()."partido/panelregistrar"; ?>"><button class="btn main-color-bg">Añadir Partido</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php include('modales/mpartido.php'); ?>
    <script type="text/javascript" src="<?php echo base_url()."js/consultas/partido.js"?>"></script>
</div>
