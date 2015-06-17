<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <h4> Devolução de objeto </h4>
    </div>
    <div class="row">
        <div class="col s12">
            <form action="<?= base_url() . 'index.php/objeto/adminDevolucao' ?>" method="post">
                <div class="row center-align">
                    <div class="col s12 center-align">
                        <h5> Detalhes Objeto</h5>
                    </div>
                    <div class="row">
                        <div class="col s4 offset-s3"><p><?= $requisicao->getIdObjeto()->getIdentificacao() ?></p></div>
                        <div class="col s4"><p><?= $requisicao->getIdObjeto()->getDescricao() ?></p></div>
                    </div>
                </div>
                <div class="row center-align">
                    <div class="col s12 center-align">
                        <h5> Detalhes Usuário</h5>
                    </div>
                    <div class="row">
                        <div class="col s4 offset-s3"><p><?= $requisicao->getIdPerfil()->getNome() ?></p></div>
                        <div class="col s4"><p><?= $requisicao->getIdPerfil()->getEmail() ?></p></div>
                    </div>
                    <div class="row">
                        <div class="col s4 offset-s3"><p><?= $requisicao->getIdPerfil()->getTelefone() ?></p></div>
                        <div class="col s4"><p><?= $requisicao->getIdPerfil()->getRg() ?></p></div>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php $this->load->view('_inc/footer') ?>