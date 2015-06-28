<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 right-align">
            <a href="<?=base_url().'index.php/usuario/adminNovoUsuario'?>" class="btn waves-effect blue darken-1">Novo Usuário</a>
            <a href="<?=base_url().'index.php/usuario/adminNovoAdmin'?>" class="btn waves-effect blue darken-1">Novo Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="center-align col s12">
            <h4>Usuários</h4>
        </div>
        <div class="col s12 center-align">
            <table class="responsive-table centered">
                <thead>
                <tr>
                    <th> Nome</th>
                    <th> Email</th>
                    <th> RG</th>
                    <th> Telefone</th>
                    <th> &nbsp</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($users)) { ?>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user->getNome() ?></td>
                            <td><?= $user->getEmail() ?></td>
                            <td><?= $user->getRg() ?></td>
                            <td><?= $user->getTelefone() ?></td>
                            <?php $url = base_url() . "index.php/Usuario/excluirUsuario/" . $user->getId(); ?>
                            <td><a href="<?=base_url().'index.php/usuario/adminEditarUsuario/'.$user->getId()?>">Editar</a> | <a onclick="return confirmar('<?= $url ?>')">Excluir</a></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="center-align col s12">
            <h4>Admins</h4>
        </div>
        <div class="col s12 center-align">
            <table class="responsive-table centered">
                <thead>
                <tr>
                    <th> Nome</th>
                    <th> Email</th>
                    <th> RG</th>
                    <th> Telefone</th>
                    <th> &nbsp</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($admins)) { ?>
                    <?php foreach ($admins as $admin) { ?>
                        <tr>
                            <td><?= $admin->getNome() ?></td>
                            <td><?= $admin->getEmail() ?></td>
                            <td><?= $admin->getRg() ?></td>
                            <td><?= $admin->getTelefone() ?></td>
                            <?php $url = base_url() . "index.php/Usuario/excluirAdmin/" . $admin->getId(); ?>
                            <td><a href="<?=base_url().'index.php/usuario/adminEditarAdmin/'.$admin->getId()?>">Editar</a> | <a onclick="return confirmar('<?= $url ?>')">Excluir</a></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('a').css('cursor', 'pointer');
    </script>
<?php $this->load->view('_inc/footer') ?>