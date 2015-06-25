<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <h4> Devolução de objeto </h4>
    </div>
    <div class="row">
        <div class="col s12">
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
        </div>
        <div class="col s12 right-align"><a
                href="<?= base_url() . 'index.php/objeto/adminDevolucao/' . $requisicao->getReqId() ?>"
                class="btn waves-effect blue darken-1">Devolver</a></div>
    </div>
<?php $this->load->view('_inc/footer') ?>