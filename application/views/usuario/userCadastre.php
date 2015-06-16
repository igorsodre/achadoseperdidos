<?php $this->load->view('_inc/header') ?>

    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Cadastro de Usuário</h3>
        </div>
        <form name="cadastreUserForm" onsubmit="return validateFormUserCadastre()" class="col s12" action="<?= base_url() . 'index.php/usuario/cadastroAction' ?>" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input class="validade" id="cadastreNome" type="text" name="nome">
                    <label for="cadastreNome" class="teal-text"> Nome </label>
                </div>
                <div class="input-field col s6">
                    <input class="validade" id="cadastreLogin" type="text" name="login">
                    <label for="cadastreLogin" class="teal-text"> Login </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input class="validade" id="cadastreSenha" type="password" name="senha"
                                 >
                    <label for="cadastreSenha" class="teal-text">Senha</label>
                </div>
                <div class="input-field col s6">
                    <input class="validade" id="cadastreEmail" type="text" name="email">
                    <label for="cadastreEmail" class="teal-text">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input class="validade" id="cadastreTelefone" type="text" name="telefone">
                    <label for="cadastreTelefone" class="teal-text">Telefone</label>
                </div>

                <div class="input-field col s6">
                    <input class="validade" id="cadastreRg" type="text" name="rg">
                    <label for="cadastreRg" class="teal-text">RG</label>
                </div>
            </div>
            <input type="hidden" name="tipo" value="1">

            <div class="col s2 offset-s5">
                <button CLASS="btn waves-effect blue darken-1" value="GO">GO</button>
            </div>
            <label>
                <input type="submit" value="GO" style="display:none ">
            </label>
        </form>
    </div>
<?php $this->load->view('_inc/footer') ?>