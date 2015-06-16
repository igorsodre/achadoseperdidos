<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 center-align">
            <h3 class="col s12 center-align"> Listagem de Objetos</h3>
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
                <?php if (isset($objetos)) { ?>
                    <?php foreach ($objetos as $objeto) { ?>
                        <tr class="mypictures">
                            <td><?= $objeto->getIdentificacao() ?></td>
                            <td><?= $objeto->getDescricao() ?></td>
                            <td><img src="<?= base_url() . $objeto->getFoto() ?>" class="responsive-img"
                                     style="height: 100px">
                            </td>
                            <td><a class="btn waves-effect  blue darken-1"
                                   href="<?= base_url() . 'index.php/objeto/requisitarObjeto/' . $objeto->getId() ?>">
                                    Requisitar Devolucao </a></td>
                        </tr>

                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $this->load->view('_inc/footer') ?>