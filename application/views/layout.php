<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!DOCTYPE html>
 <html lang="es">
     <head>
         <meta charset="utf-8">
         <title>Politiqueo</title>
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     </head>
     <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        HEADER
                    </div>
                </div>
            </div>
        </header>
        <div id="main-content">
            <?php $this->load->view($content,$dataView); ?>
        </div>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        FOOTER
                    </div>
                </div>
            </div>
        </footer>
     </body>
 </html>
