<?php $this->load->view('_inc/header') ?>
    <div class="row center-align">
        <h4>Listagem de objetos</h4>
    </div>
    <div class="row">
        <div class="col s3 offset-s9">
            <a class="btn waves-effect blue darken-1" href="<?= base_url() . 'index.php/objeto/adminNewObject' ?>">Novo
                Objeto</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <h4>Objetos Perdidos </h4>
        </div>
        <div class="col s12 center-align">
            <table class="responsive-table centered">
                <thead>
                <tr>
                    <th> Identificacao</th>
                    <th> Descricao</th>
                    <th> Foto</th>
                    <th> &nbsp</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($perdidos)) { ?>
                    <?php foreach ($perdidos as $perdido) { ?>
                        <tr class="mypictures">
                            <td><?= $perdido->getIdentificacao() ?></td>
                            <td><?= $perdido->getDescricao() ?></td>
                            <td><img src="<?= base_url() . $perdido->getFoto() ?>" class="responsive-img"
                                     style="height: 100px">
                            </td>
                            <td><a class="btn waves-effect  blue darken-1"
                                   href="<?= base_url() . 'index.php/objeto/adminEditObject/' . $perdido->getId() ?>">Editar</a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <h4>Objetos Requisitados</h4>
        </div>
        <div class="col s12 center-align">
            <table class="responsive-table centered">
                <thead>
                <tr>
                    <th> Identificacao</th>
                    <th> Descricao</th>
                    <th> Foto</th>
                    <th> &nbsp</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($requisitados)) { ?>
                    <?php foreach ($requisitados as $requisitado) { ?>
                        <tr class="mypictures">
                            <td><?= $requisitado->getIdentificacao() ?></td>
                            <td><?= $requisitado->getDescricao() ?></td>
                            <td><img src="<?= base_url() . $requisitado->getFoto() ?>" class="responsive-img"
                                     style="height: 100px">
                            </td>
                            <td><a class="btn waves-effect  blue darken-1"
                                   href="<?= base_url() . 'index.php/objeto/adminReturnObject/' . $requisitado->getId() ?>">Devolver
                                    Objeto </a></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->load->view('_inc/footer') ?>