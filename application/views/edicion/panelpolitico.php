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
                <td><button class="btn btn-peru pop-up" href="politico/borrarpolitico" data-id="<?php echo $resultado[$i]['id_politico']?>">Eliminar</button></td>
            </tr>
            <?php } ?>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                    <button type="button" class="btn btn-peru redirect" href="politico/panelregistrar">Añadir Político</button>
                </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function(){
                $(".redirect").click(function(){
                    var btn = $(this);
                    window.location.href = btn.attr("href")
                })
            })
            </script>
        </div>
    </div>
</div>
