<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12">
            <h3 class="center-align"> Atualização de usuário </h3>
        </div>
        <form class="col s12" action="<?= base_url() . 'index.php/usuario/updateAction' ?>" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input class="validade" id="updatenome" type="text" name="nome" value="<?= $user->getNome() ?>">
                    <label for="updatenome" class="black-text teal-text"> Nome </label>
                </div>
                <div class="input-field col s6">
                    <input class="validade" id="updateemail" type="text" name="email" value="<?= $user->getEmail() ?>">
                    <label for="updateemail" class="black-text teal-text"> Email </label>
                </div>

            </div>
            <div class="row">

                <div class="input-field col s6">
                    <input class="validade" id="updaterg" type="text" name="rg" value="<?= $user->getRg() ?>">
                    <label for="updaterg" class="black-text teal-text"> RG </label>
                </div>
                <div class="input-field col s6">
                    <input class="validade" id="updatetelefone" type="text" name="telefone"
                           value="<?= $user->getTelefone() ?>">
                    <label for="updatetelefone" class="black-text teal-text"> Telefone </label>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $user->getId() ?>">
            <input type="hidden" name="login" value="<?= $user->getLogin() ?>">
            <input type="hidden" name="senha" value="<?= $user->getSenha() ?>">
            <input type="hidden" name="tipo" value="<?= $user->getTipo() ?>">

            <div class="col s4 offset-s5">
                <button class="btn waves-effect blue darken-1 white-text center-align"> GO</button>
                <input id="updateusersubmit" class="" type="submit" style="display: none">
            </div>
        </form>
    </div>
<?php $this->load->view('_inc/footer') ?>