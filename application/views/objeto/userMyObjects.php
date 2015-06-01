<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 ">
            <h3 class="text-center center-align"> Meus Objetos</h3>
        </div>
        <div class="col s12">
            <h4 class="text-center center-align"> Objetos cadastrados </h4>
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
                <?php if (isset($cadastrados)) { ?>
                    <?php foreach ($cadastrados as $cadastrado) { ?>
                        <tr class="mypictures">
                            <td><?= $cadastrado->getIdentificacao() ?></td>
                            <td><?= $cadastrado->getDescricao() ?></td>
                            <td><img src="<?= base_url() . $cadastrado->getFoto() ?>" class="responsive-img"
                                     style="height: 200px">
                            </td>
                        </tr>

                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
        <div class="col s12">
            <h4 class="text-center center-align"> Objetos Requisitados </h4>
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
                                     style="height: 200px">
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $this->load->view('_inc/footer') ?>