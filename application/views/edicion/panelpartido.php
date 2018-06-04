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
                <td><button class="btn btn-peru pop-up" href="partido/actualizarpartido" data-id="<?php echo $resultado[$i]['id_partido']?>">Editar</button></td>
                <td><button class="btn btn-peru pop-up" href="partido/borrarpartido" data-id="<?php echo $resultado[$i]['id_partido']?>">Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                    <button class="btn pop-up btn-peru" href="partido/anadirpartido">Añadir Partido</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
