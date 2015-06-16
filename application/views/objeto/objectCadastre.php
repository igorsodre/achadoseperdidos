<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <div class="col s12 center-align">
            <h3>Novo Objeto perdido</h3>
        </div>
        <form id="add-obj-form" class="col s12" action="<?= base_url() . 'index.php/objeto/cadastroAction' ?>"
              method="post" enctype="multipart/form-data">
            <div class="input-field col s6 offset-s3">
                <input id="objCreateId" class="validade" type="text" name="identificacao"
                       placeholder="insira uma identificao para o objeto">
                <label for="objCreateId" class="teal-text" style="font-size: 18">Identificação</label>
            </div>
            <div class="col s12">
                <div class="input-field col s6 offset-s3">
                    <textarea class="materialize-textarea" id="objCreateDes" cols="20" rows="3" name="descricao"
                              form="add-obj-form"></textarea>
                    <label for="objCreateDes" class="teal-text" style="font-size: 18">Descrição</label>
                </div>
            </div>
            <div class="col s12 center-align">
                <button id="fotoButton" type="button" class="btn waves-effect red darken-1">ADD FOTO</button>
                <script>
                    $('#fotoButton').click(function () {
                        $('#objCreateFoto').click();
                    });
                </script>
                <input id="objCreateFoto" type="file" name="foto" style="display: none">
            </div>
            <div class="row"><p></p></div>
            <div class="col s12 center-align">
                <button class="btn waves-effect blue darken-1">GO</button>
                <input type="submit" value="GO" style="display: none">
            </div>
        </form>
    </div>

<?php $this->load->view('_inc/footer') ?>