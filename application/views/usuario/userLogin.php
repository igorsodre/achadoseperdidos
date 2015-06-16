<?php $this->load->view('_inc/header') ?>
    <div class="row center-align">
        <div class="col s12">
            <h3 class="center-align">Faça Seu Login</h3>
        </div>
        <div class="col s6 offset-s3 center-align">
            <form class="col s12" action="<?= base_url() . 'index.php/usuario/doLogin' ?>" method="post"
                  id="form-login">
                <div class="input-field col s6">
                    <input id="loginField" class="validade" type="text" name="login">
                    <label for="loginField" class="teal-text"> Usuário </label>
                </div>
                <div class="input-field col s6">
                    <input id="senhaField" class="validade" type="password" name="senha"><br>
                    <label for="senhaField" class="teal-text">Senha</label>
                </div>
                <div class="col s5 offset-s7">
                    <a href="#">Esqueci Minha Senha</a>
                </div>
                <div class="row"><p> </p></div>
                <div class="col s12">
                    <button class="btn waves-effect blue darken-1">GO</button>
                    <input type="submit" value="entrar" style="display: none">
                </div>
            </form>
        </div>
    </div>

<?php $this->load->view('_inc/footer') ?>