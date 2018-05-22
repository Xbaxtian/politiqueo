<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="section-politico">
    <div class="container">
        <h2>Informacion Personal</h2>
        <hr>
        <div class="row">
            <div class="col-md-2" align="center">
                <figure class="figure">
                    <img src="<?php echo base_url().$dataPolitico['imagen']?>" alt="">
                </figure>
            </div>
            <div class="col-md-10">
                <form>
                    <div class="form-group row">
                        <label for="nombreP" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nombreP" value="<?php echo $dataPolitico['nombres']." ".$dataPolitico['apellidos']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edadP" class="col-sm-2 col-form-label">Edad</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="edadP" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bancadaP" class="col-sm-2 col-form-label">Bancada</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="bancadaP" value="<?php echo $dataPolitico['nombre']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="representaP" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="condicionP" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h2>Formación academica</h2>
        <hr>
        <h2>Historial de cargos públicos</h2>
        <hr>
        <h2>Casos de corrupcion implicados</h2>
        <hr>
    </div>
</section>
