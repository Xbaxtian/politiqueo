<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <html lang="es">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Politiqueo</title>
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
         <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
         <link rel="stylesheet" href="<?php echo base_url()?>css/style-layout.css">
         <link rel="stylesheet" href="<?php echo base_url()?>css/style-layoutAdmin.css">
         <link rel="stylesheet" href="<?php echo base_url()?>css/style-barra.css">
     </head>
     <body>
         <script src="<?php echo base_url()?>js/libraries/jquery-3.3.1.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
         <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>

         <nav class="navbar navbar-default navbar-expand">
                 <div class="container">
                     <div class="navbar-header">
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"></button>
                     <a class="navbar-brand" href="<?php echo base_url(); ?>">POLITIQUEO</a>
                     </div>
                     <div class="collapse navbar-collapse navbar" id="navbar">
                           <ul class="navbar-nav">
                    <!--           <li class="nav-item">
                                  <a class="nav-link" href="#">Añadir Organización</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Añadir Partido</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Añadir Político</a>
                               </li>  -->
                           </ul>
                           <ul class="nav navbar-nav navbar-right">
                               <li class="nav-item">
                                 <a class="nav-link" href="#">Bienvenido,<?php echo $this->session->userdata('nombres'); ?></a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url()."Login/logout" ?>">Cerrar Sesión</a>
                               </li>
                           </ul>
                     </div>
                 </div>
           </nav>
         <header class="header-login">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-12">
                       <h1 class="text-center"> Area de Administracion</h1>
                   </div>
                 </div>
             </div>
         </header>
         <section id="menu">
             <div class="container">
                 <div class="row ">
                     <div class="col-md-3">
                         <div class="list-group">
                             <?php
                             $modulos = getModulo($this->session->userdata('id_rol'));
                             $badge = totalModulos($this->session->userdata('id_rol'));
                             ?>
                             <a href="<?php echo base_url()."admin"; ?>" class="list-group-item main-color-bg">Administración</a>
                             <?php for ($i=0; $i < count($modulos); $i++){ ?>
                             <a href="<?php echo base_url().$modulos[$i]['direccion']; ?>" class="list-group-item d-flex justify-content-between align-items-center item"><?php echo $modulos[$i]['nombre'];?>
                             <?php if($modulos[$i]['id_modulo'] < 3) {?><span class="badge main-color-bg"><?php echo $badge[$i]; ?></span> <?php } ?></a>
                         <?php } ?>
                        </div>
                     </div>
                     <?php
                     $this->load->view($content,$dataView);
                     ?>
                 </div>
             </div>
        </section>
        
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 developed">
                        LambdaDev - 2018
                    </div>
                </div>
            </div>
        </footer>
     </body>
 </html>