<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 center-align">
            <h3>Home administrador</h3>
        </div>
        <div class="col s2 offset-s10">
            <a class="btn waves-effect blue darken-1" href="<?= base_url() . 'index.php/usuario/doLogout' ?>">
                LOGOUT </a>
        </div>
    </div>
<?php $this->load->view('_inc/footer') ?>