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
                    <form id="regpolitico">
                        <div class="form-group row">
                            <label for="imagenP" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="imagenP" placeholder="URL de imagen">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombreP" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellidoP" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edadP" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id="edadP" placeholder="Edad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dniP" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="dniP" placeholder="Documento Nacional de Identidad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bancadaP" class="col-sm-2 col-form-label">Bancada</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="bancadaP" placeholder="Bancada">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cargoP" placeholder="Cargo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control " id="representaP" placeholder="Representa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="condicionP" placeholder="Condicion">
                            </div>
                        </div>
                        <div class="form-group row tarjeta">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-peru">Registrar</button>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript" src="<?php echo base_url()."js/consultas/politico.js"?>"></script>
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
