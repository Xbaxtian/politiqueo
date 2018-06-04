<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-9">
    <div class="main-color-bg">
        <h2 class="card-header">Informacion Personal</h2>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2" align="center">
                    <figure class="figure">
                        <img src="" alt="">
                    </figure>
                </div>
                <div class="col-md-10">
                    <?php echo form_open(base_url()."politico/recibirdatos",array('id'=>'form-validado'));?>
                        <div class="form-group row">
                            <label for="imagenP" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                            <?php
                            $url = array('type'=>'text','class'=>'form-control','name'=>'imagenP','placeholder'=>'URL de imagen');
                            echo form_input($url);
                            ?>
                            <?php echo form_error('imagenP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                            <?php
                            $nombre = array('type'=>'text','class'=>'form-control','name'=>'nombreP','placeholder'=>'Nombre');
                            echo form_input($nombre);
                            ?>
                            <?php echo form_error('nombreP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                            <?php
                            $apellidos = array('type'=>'text','class'=>'form-control','name'=>'apellidoP','placeholder'=>'Apellidos');
                            echo form_input($apellidos);
                            ?>
                            <?php echo form_error('apellidoP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edadP" class="col-sm-2 col-form-label">Año de Nacimiento</label>
                            <div class="col-sm-10">
                            <?php
                            $edad = array('type'=>'date','class'=>'form-control','name'=>'edadP','placeholder'=>'Edad');
                            echo form_input($edad);
                            ?>
                            <?php echo form_error('edadP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dniP" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                            <?php
                            $dni = array('type'=>'text','class'=>'form-control','name'=>'dniP','placeholder'=>'Documento Nacional de Identidad');
                            echo form_input($dni);
                            ?>
                            <?php echo form_error('dniP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bancadaP" class="col-sm-2 col-form-label">Bancada</label>
                            <div class="col-sm-10">
                            <?php
                            $bancada = array('type'=>'text','class'=>'form-control','name'=>'bancadaP','placeholder'=>'Bancada');
                            echo form_input($bancada);
                            ?>
                            <?php echo form_error('bancadaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
                            <div class="col-sm-10">
                            <?php
                            $bancada = array('type'=>'text','class'=>'form-control','name'=>'cargoP','placeholder'=>'Cargo');
                            echo form_input($bancada);
                            ?>
                            <?php echo form_error('cargoP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                            <div class="col-sm-10">
                            <?php
                            $representa = array('type'=>'text','class'=>'form-control','name'=>'representaP','placeholder'=>'Lugar al que representa');
                            echo form_input($representa);
                            ?>
                            <?php echo form_error('representaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                            <div class="col-sm-10">
                            <?php
                            $condicion = array('type'=>'text','class'=>'form-control','name'=>'condicionP','placeholder'=>'Condicion');
                            echo form_input($condicion);
                            ?>
                            <?php echo form_error('condicionP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row tarjeta">
                            <div class="col-sm-10">
                            <button class="btn btn-peru send-formp">Registrar</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <script src=<?php echo base_url()."js/validations.js";?>></script>
                </div>
            </div>
        </div>
    </div>
    <h2>Formación academica</h2>
    <hr>
    <h2>Historial de cargos públicos</h2>
    <hr>
    <h2>Casos de corrupcion implicados</h2>
    <hr>
</div>
