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
                    <img src="<?php echo $dataPolitico['imagen']?>" height="100" width="100">
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
                        <input type="text" readonly class="form-control" id="edadP" value="<?php echo $diff = abs(date('Y-m-d') - $dataPolitico['fec_nacimiento']);?>">
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
                        <input type="text" readonly class="form-control" id="representaP" value="<?php echo $dataPolitico['representa']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="condicionP" value="<?php echo $dataPolitico['condicion']?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="">
            <h2>Formación academica</h2>
            <table class="table tarjeta table-sm">
                <thead class="btn-peru">
                    <tr>
                        <th>Estudios </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <th>Grado</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Año de inicio</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Año de finalización</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
        <hr>
        <div class="">
            <h2>Historial de cargos públicos</h2>
        </div>
        <hr>
        <div class="">
            <h2>Casos de corrupcion implicados</h2>
        </div>
        <hr>
    </div>
</section>
