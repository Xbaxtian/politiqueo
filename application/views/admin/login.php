<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<header class="header-login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> Area de Administracion</h1>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 card">
                <form id="login" class="card-body">
                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-peru btn-block">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>
</section>