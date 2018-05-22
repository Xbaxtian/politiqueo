<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<div class="col-md-9">
    <div class="main-color-bg">
        <h3 class="card-header">Añadir Partido</h3>
    </div>
    <div class="card tarjeta">
        <div class="card-group">
            <div class="card-body">
                    <?php echo form_open(base_url()."admin/recibirdatos_nuevo") ?>
                    <div class="form-group">
                        <label>Nombre de Partido</label>
                        <?php
                        $nombre = array('type'=>'text','name'=> 'nombre','placeholder'=>'Nombre','class'=>'form-control');
                        echo form_input($nombre);
                        ?>
                    </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card-body">
                <div class="form-group">
                    <label>Imagen o Logo</label>
                    <?php
                    $imagen = array('type'=>'text','name'=> 'imagen','placeholder'=>'Inserte una direccion URL','class'=>'form-control');
                    echo form_input($imagen);
                    ?>
                </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card-body offset-9">
                <div class="form-group">
                    <?php $submit = array('type'=>'submit','class'=>'btn btn-peru','value'=>'Agregar Partido');
                      echo form_input($submit);
                    ;?>
                </div>
            </div>
        </div>
    </div>
</div>
