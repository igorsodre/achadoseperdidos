<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 center-align">
            <h3>Atualização de Objeto</h3>
        </div>
    </div>
    <div class="row">
        <form id="updt-obj-form" method="post" class="col s12" action="<?= base_url() . 'index.php/objeto/atualizacaoObjetoAction' ?>"
              enctype="multipart/form-data">
            <div class="input-field col s6 offset-s3">
                <input required pattern=".{2,45}" id="objUpdteId" class="validade" type="text" name="identificacao"
                       value="<?= $objeto->getIdentificacao() ?>">
                <label for="objUpdteIdId" class="teal-text" style="font-size: 18">Identificação</label>
            </div>

            <div class="col s12">
                <div class="input-field col s6 offset-s3">
                    <textarea required class="materialize-textarea" id="objUpdateDes" cols="20" rows="3" name="descricao"
                              form="updt-obj-form"><?= $objeto->getDescricao() ?></textarea>
                    <label for="objUpdteIdDes" class="teal-text" style="font-size: 18">Descrição</label>
                </div>
            </div>
            <div class="col s12 center-align">
                <button id="myPicButon" type="button" class="btn waves-effect red darken-1">ADD NEW PIC</button>
                <script>
                    $('#myPicButon').click(function(){
                        $('#userUpdateObj').click();
                    });
                </script>
            </div>
            <input id="userUpdateObj" type="file" name="foto" style="display: none;">
            <input type="hidden" name="old_foto" value="<?= $objeto->getFoto() ?>">
            <input type="hidden" name="id" value="<?= $objeto->getId() ?>">
            <input type="hidden" name="status" value="<?= $objeto->getStatus() ?>">

            <div class="row"><p></p></div>
            <div class="cols 12 center-align">
                <button class="btn waves-effect blue">GO</button>
                <input type="submit" style="display: none">
            </div>
        </form>

    </div>
<?php $this->load->view('_inc/footer') ?>