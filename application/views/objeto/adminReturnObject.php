<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <h4> Devolução de objeto </h4>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <h5> Detalhes Objeto</h5>
                </div>
                <div class="row">
                    <div class="col s4"><p> Identificação: <?= $requisicao->getIdObjeto()->getIdentificacao() ?></p></div>
                    <div class="col s4"><p>Descrição: <?= $requisicao->getIdObjeto()->getDescricao() ?></p></div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <h5> Detalhes Usuário</h5>
                </div>
                <div class="row">
                    <div class="col s4"><p>Nome: <?= $requisicao->getIdPerfil()->getNome() ?></p></div>
                    <div class="col s4"><p>Email: <?= $requisicao->getIdPerfil()->getEmail() ?></p></div>
                </div>
                <div class="row">
                    <div class="col s4"><p>Telefone: <?= $requisicao->getIdPerfil()->getTelefone() ?></p></div>
                    <div class="col s4"><p>RG: <?= $requisicao->getIdPerfil()->getRg() ?></p></div>
                </div>
            </div>
        </div>
        <div class="col s12 right-align"><a
                href="<?= base_url() . 'index.php/objeto/adminDevolucao/' . $requisicao->getReqId() ?>"
                class="btn waves-effect blue darken-1">Devolver</a></div>
    </div>
<?php $this->load->view('_inc/footer') ?>