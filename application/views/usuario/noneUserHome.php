<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div col s12>
            <h3 class="center-align"> None User Home </h3>
        </div>
    </div>
    <div class="row">
        <div class="col s2 offset-s7">
            <p>
                <a class="btn waves-effect blue darken-1" href="<?= base_url() . 'index.php/usuario/loginScreen' ?>">Login
                    Page</a>
            </p>
        </div>
        <div class="col s3">
            <p>
                <a class="btn waves-effect blue darken-1" href="<?= base_url() . 'index.php/usuario/cadastro' ?>"> Cadastre-se</a>
            </p>
        </div>
    </div>

<?php $this->load->view('_inc/footer') ?>