        <?php
            $valueid = "";
            $valuedescripcion = "";
            $valuetitulo = "";
            $valueurl = "";
            $direccion = "";
            $titulo = "";
            if(isset($resultado)){
                $valueid = $resultado[0]['id_organo'];
                $valuedescripcion = $resultado[0]['descripcion'];
                $valuetitulo = $resultado[0]['titulo'];
                $valueurl = $resultado[0]['imagen'];
                $direccion = base_url().'organo/actualizar';
                $titulo = "Editar";
            }
            else{
                $valuedescripcion = set_value('descripcion');
                $valuetitulo = set_value('titulo');
                $valueurl = set_value('url');
                $direccion = base_url().'organo/recibirdatos';
                $titulo = "Añadir";
            }
        ?>
        <div class="modal-header main-color-bg">
            <h4 class="modal-title " id="titleorgano"><?php echo $titulo; ?> Organo</h4>
            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <?php echo form_open($direccion,array('id'=>'form-validado')); ?>
            <input type="hidden" name="id" value="<?php echo $valueid; ?>">
            <div class="form-group">
                <label>Descripción</label>
                <?php
                $descripcion = array('type'=>'text','placeholder'=>'Descripcion','class'=>'form-control','name'=>'descripcion','value'=>$valuedescripcion);
                echo form_input($descripcion);
                ?>
                <?php echo form_error('descripcion','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Titulo</label>
                <?php
                $titulo = array('type'=>'text','name'=> 'titulo','placeholder'=>'Titulo','class'=>'form-control','value'=>$valuetitulo);
                echo form_input($titulo);
                ?>
                <?php echo form_error('titulo','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Imagen o Logo</label>
                <?php
                $url = array('type'=>'text','name'=> 'url','placeholder'=>'URL de Imagen','class'=>'form-control','value'=>$valueurl);
                echo form_input($url);
                ?>
                <?php echo form_error('url','<div class="form-error">*', '</div>'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn main-color-bg send-form">Guardar</button> <!--send form clase para enviar el formulario form-validado -->
        </div>

<script src="js/validations.js"></script>
