<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<header class="header-login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> Área de Administración</h1>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 card">
                <?php $atributos = array('class' => 'card-body', 'id' => 'login');
                echo form_open(base_url()."Login/acceso",$atributos);?>
                    <div class="form-group">
                    <label>Email</label>
                    <?php $email = array('type'=>'email','name'=> 'email','placeholder'=>'Email','class'=>'form-control');
                    echo form_input($email); ?>
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <?php $pass = array('type'=>'password','name'=> 'pass','placeholder'=>'Password','class'=>'form-control');
                    echo form_input($pass); ?>
                    </div>
                    <?php $submit = array('type'=>'submit','class'=>'btn btn-peru btn-block','value'=>'Iniciar Sesion');
                    echo form_submit($submit); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
