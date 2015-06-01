<?php $this->load->view('_inc/header') ?>
    <div class="row center-align">
        <div class="col s12">
            <h3 class="center-align">Faça Seu Login</h3>
        </div>
        <div class="col s6 offset-s3 center-align">
            <form class="" action="<?= base_url() . 'index.php/usuario/doLogin' ?>" method="post"
                  id="form-login">
                <br>
                <label>
                    <p>Usuário:</p> <input type="text" name="login">
                </label>
                <br>
                <label>
                    <p> Senha:</p> <input type="password" name="senha"><br>
                </label>
                <br>
                <input type="submit" value="entrar">
            </form>
        </div>
    </div>

<?php $this->load->view('_inc/footer') ?>