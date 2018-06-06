<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

        $valueid =  " ";
        $valueimagen = " ";
        $valuenombre =  " ";
        $valueapellido = " ";
        $valuefecnacimiento =  " ";
        $valuedni = " ";
        $valuecargo =  " ";
        $valuerepresenta =  " ";
        $valuecondicion =  " ";
        $direccion = "";

    if(isset($resultado)){

        $valueid = $resultado['id_politico'];
        $valueimagen = $resultado['imagen'];
        $valuenombre = $resultado['nombres'];
        $valueapellido = $resultado['apellidos'];
        $valuefecnacimiento = $resultado['fec_nacimiento'];
        $valuedni = $resultado['dni'];
        $valuecargo = $resultado['id_cargo'];
        $valuerepresenta = $resultado['representa'];
        $valuecondicion = $resultado['condicion'];
        $direccion = "politico/actualizar";
    }
    else
    {
        $valueimagen = set_value('imagenP');
        $valuenombre = set_value('nombreP');
        $valueapellido = set_value('apellidoP');
        $valuefecnacimiento = set_value('edadP');
        $valuerepresenta = set_value('representaP');
        $valuedni = set_value('dniP');
        $valuecondicion = set_value('condicionP');
        $direccion = "politico/recibirdatos";
    }
?>

    <div class="main-color-bg">
        <h2 class="card-header">Informacion Personal</h2>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 tarjeta">
                    <figure class="figure">
                        <img src="<?php echo $valueimagen; ?>" alt="">
                    </figure>
                </div>
                <div class="col-md-10 tarjeta">
                    <?php echo form_open($direccion,array('id'=>'form-validado'));?>
                        <input type="hidden" name="id" value=<?php echo $valueid; ?>>
                        <div class="form-group row">
                            <label for="imagenP" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                            <?php
                            $url = array('type'=>'text','class'=>'form-control','name'=>'imagenP','placeholder'=>'URL de imagen', 'value' => $valueimagen );
                            echo form_input($url);
                            ?>
                            <?php echo form_error('imagenP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                            <?php
                            $nombre = array('type'=>'text','class'=>'form-control','name'=>'nombreP','placeholder'=>'Nombre', 'value'=>$valuenombre);
                            echo form_input($nombre);
                            ?>
                            <?php echo form_error('nombreP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                            <?php
                            $apellidos = array('type'=>'text','class'=>'form-control','name'=>'apellidoP','placeholder'=>'Apellidos','value'=>$valueapellido);
                            echo form_input($apellidos);
                            ?>
                            <?php echo form_error('apellidoP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edadP" class="col-sm-2 col-form-label">Año de Nacimiento</label>
                            <div class="col-sm-10">
                            <?php
                            $edad = array('type'=>'date','class'=>'form-control','name'=>'edadP','placeholder'=>'Edad','value'=>$valuefecnacimiento);
                            echo form_input($edad);
                            ?>
                            <?php echo form_error('edadP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dniP" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                            <?php
                            $dni = array('type'=>'text','class'=>'form-control','name'=>'dniP','placeholder'=>'Documento Nacional de Identidad','type'=>'number','value'=>$valuedni);
                            echo form_input($dni);
                            ?>
                            <?php echo form_error('dniP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bancadaP" class="col-sm-2 col-form-label">Bancada</label>
                            <div class="col-sm-7">
                                <select class="custom-select">
                                  <option name="bancadaP" value=" <?php if(isset($resultado)){ echo $partidopolitico[0]['id_partido']; }else{ echo " ";} ?>" selected> <?php if(isset($resultado)){ echo $partidopolitico[0]['nombre']; }else{ echo "Partidos";} ?></option>
                                  <?php for ($i=0; $i <count($partidos) ; $i++) { ?>
                                       <option name="bancadaP" value="<?php echo $partidos[$i]['id_partido']; ?>"> <?php echo $partidos[$i]['nombre'] ?> </option>
                                  <?php } ?>
                                </select>
                            <?php echo form_error('bancadaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                            <div class="col-sm-3 align-self-center ">
                            <button type="button" class="btn btn-peru pop-up btn-sm" href="partido/anadirpartido">Añadir Partido</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
                            <div class="col-sm-7">
                                <select class="custom-select">
                                  <option selected>Cargos</option>
                                  <?php for ($i=0; $i <count($cargos) ; $i++) { ?>
                                       <option name="<?php echo $partidos[$i]['id_cargo'] ?>" value="<?php echo $i; ?>"><?php echo $cargos[$i]['descripcion'] ?></option>
                                  <?php } ?>
                                </select>
                            <?php echo form_error('cargoP','<div class="form-error">*', '</div>'); ?>
                            </div>
                            <div class="col-sm-3 align-self-center ">
                            <button type="button" class="btn btn-peru pop-up btn-sm" href="<?php echo base_url()."cargo"; ?>">Añadir Cargo</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                            <div class="col-sm-10">
                            <?php
                            $representa = array('type'=>'text','class'=>'form-control','name'=>'representaP','placeholder'=>'Lugar al que representa','value'=>$valuerepresenta);
                            echo form_input($representa);
                            ?>
                            <?php echo form_error('representaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                            <div class="col-sm-10">
                            <?php
                            $condicion = array('type'=>'text','class'=>'form-control','name'=>'condicionP','placeholder'=>'Condicion','value'=>$valuecondicion);
                            echo form_input($condicion);
                            ?>
                            <?php echo form_error('condicionP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="form-group row tarjeta">
                            <div class="col-sm-10">
                            <button class="btn btn-peru send-formp">Guardar</button>
                            </div>
                        </div>
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

    <script type="text/javascript">
    $(".pop-up").click(function(){
        var btn = $(this);
        $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
            $("#modal-target .modal-content").html("");
            $("#modal-target .modal-content").html(data);
            $("#modal-pop-up").modal();
        }).fail(function(){
            alert( "Error de red" );
        })
    });
    </script>
