<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<div class="col-md-9">
    <div class="main-color-bg">
        <h3 class="card-header">Añadir Organo</h3>
    </div>
    <div class="card tarjeta">
        <div class="card-group">
            <div class="card-body">
                    <?php echo form_open(base_url()."admin/addorgano") ?>
                    <div class="form-group">
                        <label>Titulo</label>
                        <?php
                        $titulo = array('type'=>'text','name'=> 'titulo','placeholder'=>'Titulo','class'=>'form-control');
                        echo form_input($titulo);
                        ?>
                    </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Descripción</label>
                    <?php
                    $descripcion = array('type'=>'text','name'=> 'descripcion','placeholder'=>'Descripción','class'=>'form-control');
                    echo form_input($descripcion);
                    ?>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Imagen o Logo</label>
                    <?php
                    $imagen = array('type'=>'text','name'=> 'imagen','placeholder'=>'Inserte una direccion URL','class'=>'form-control');
                    echo form_input($imagen);
                    ?>
                </div>
            </div>
        <div class="card-group">
            <div class="card-body offset-9">
                <div class="form-group">
                    <?php $submit = array('type'=>'submit','class'=>'btn btn-peru','value'=>'Agregar Organo');
                      echo form_input($submit);
                    ;?>
                </div>
            </div>
        </div>
    </div>
</div>
