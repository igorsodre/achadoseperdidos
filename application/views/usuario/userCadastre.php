<?php $this->load->view('_inc/header') ?>
    <h1>Cadastro de Usuário</h1>
    <div>
        <form action="<?= base_url() . 'index.php/usuario/cadastroAction' ?>" method="post">
            <p>
                <label>
                    Nome:<input type="text" name="nome" placeholder=" Insira seu nome">
                </label>
            </p>

            <p>
                <label>
                    Login:<input type="text" name="login" placeholder=" Insira seu login">
                </label>
            </p>

            <p>
                <label>
                    Senha:<input type="password" name="senha" placeholder="Insira sua senha">
                </label>
            </p>

            <p>
                <label>
                    Email:<input type="text" name="email" placeholder=" Insira seu Email">
                </label>
            </p>

            <p>
                <label>
                    Telefone:<input type="text" name="telefone" placeholder="Insira seu Telefone">
                </label>
            </p>

            <p>
                <label>
                    RG:<input type="text" name="rg" placeholder="Insira seu RG">
                </label>
            </p>
            <input type="hidden" name="tipo" value="1">
            <label>
                <input type="submit" value="GO">
            </label>
        </form>
    </div>
<?php $this->load->view('_inc/footer') ?>