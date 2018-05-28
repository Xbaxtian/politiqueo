<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
    <div class="main-color-bg">
        <h2 class="card-header">Nuevo Organo</h2>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <?php $parametros = array('id'=>'regorgano');
                    echo form_open(base_url()."organo/registrar",$parametros);?>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="descripcion" placeholder="Descripción" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edadP" class="col-sm-3 col-form-label">Título</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="titulo" placeholder="Titulo" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bancadaP" class="col-sm-3 col-form-label">Imagen o Logo</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="url" placeholder="URL de imagen" value="">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="row ">
                                <div class="col-md-9">
                                    <button id="reg" type="submit"class="btn btn-peru">Registrar</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <script type="text/javascript" src="<?php echo base_url()."js/consultas/organo.js"?>"></script>
                </div>
            </div>
        </div>
    </div>
</div>
