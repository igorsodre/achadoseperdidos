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
    <div class="row">
        <div class="col s6 center-align">
            <h4> Listar Objetos </h4>
            <a href="<?=base_url().'index.php/objeto/adminShowObjetcts'?>"><img src="<?=base_url().'public/images/listarIncon.png'?>"></a>
        </div>
        <div class="col s6 center-align">
            <h4> Listar Usuários </h4>
            <a href="<?=base_url().'index.php/usuario/listarUsuarios'?>"><img src="<?=base_url().'public/images/userIncon.png'?>"></a>
        </div>
    </div>
<?php $this->load->view('_inc/footer') ?>