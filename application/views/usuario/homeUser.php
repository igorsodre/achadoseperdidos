<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12">
            <h3 class="center-align"> Home Usuário </h3>
        </div>
        <div class="col s2 offset-s10">
            <a class="btn waves-effect blue darken-1" href="<?= base_url() . 'index.php/usuario/doLogout' ?>">
                LOGOUT </a>
        </div>
    </div>
    <div class="row center-align">
        <div class="col s6">
            <h4> Cadastrar Objeto</h4>
            <a class="" href="<?= base_url() . 'index.php/objeto/cadastro' ?>"><img
                    src="<?= base_url() . 'public/images/cadastroIncon.png' ?>"></a>
        </div>
        <div class="col s6">
            <h4> Listar Objetos </h4>
            <a href="<?= base_url() . 'index.php/objeto/listagemObjetos' ?>"><img
                    src="<?= base_url() . 'public/images/listarIncon.png' ?>"></a>
        </div>
    </div>
    <div class="row center-align">
        <div class="col s6">
            <h4> Meus Objetos </h4>
            <a href="<?= base_url() . 'index.php/objeto/meusObjetos' ?>"><img
                    src="<?= base_url() . 'public/images/myObjects.png' ?>"></a>
        </div>
        <div class="col s6">
            <h4> Editar Informações </h4>
            <a href="<?= base_url() . 'index.php/usuario/atualizaCadastro' ?>"><img
                    src="<?= base_url() . 'public/images/userIncon.png' ?>"></a>
        </div>
    </div>
<?php $this->load->view('_inc/footer') ?>