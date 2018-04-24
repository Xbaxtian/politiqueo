<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="section-principal">
    <div class="container">
        <div class="row justify-content-center">
                <div class="tarjeta congreso col-md-3">
                    <a href="<?php echo base_url()?>congreso">
                        <img src="<?php base_url()?>img/home/municipalidad.png" alt="Congreso del peru" class="imagen">
                        <h3>Congreso</h3>
                    </a>
                </div>

            <div class="tarjeta ministerio col-md-3">
                <img src="<?php base_url()?>img/home/municipalidad.png" alt="Ministerios del peru" class="imagen">
                <h3>Ministerios</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="tarjeta alcaldias col-md-3">
                <img src="<?php base_url()?>img/home/municipalidad.png" alt="Alcaldias del peru" class="imagen">
                <h3>Alcaldias</h3>
            </div>
            <div class="tarjeta col-md-3"></div>
        </div>
    </div>
</section>

<script>
    /* MOSTRAR FONDO
    $('.congreso a').mouseover(function(){
        $('.section-principal .container').css("background-image", "url(<?php base_url()?>img/home/congreso.jpg)")
    });
    $('.congreso a').mouseout(function(){
        $('.section-principal .container').css("background-image", "none")
    });*/
</script>
