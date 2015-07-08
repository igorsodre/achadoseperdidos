<?php $this->load->view('_inc/header') ?>
    <div class="row">
        <h4 class="center-align"> Cadastro de Objeto Perdido</h4>
    </div>
    <div class="row">
        <form id="add-obj-form" class="col s12" action="<?= base_url() . 'index.php/objeto/adminCreateNewObject' ?>"
              method="post" enctype="multipart/form-data">
            <div class="input-field col s6 offset-s3">
                <input required pattern=".{2,45}" id="objCreateId" class="validade" type="text" name="identificacao"
                       placeholder="insira uma identificao para o objeto">
                <label for="objCreateId" class="teal-text" style="font-size: 18">Identificação</label>
            </div>
            <div class="col s12">
                <div class="input-field col s6 offset-s3">
                    <textarea required class="materialize-textarea" id="objCreateDes" cols="20" rows="3"
                              name="descricao"
                              form="add-obj-form"></textarea>
                    <label for="objCreateDes" class="teal-text" style="font-size: 18">Descrição</label>
                </div>
            </div>
            <div class="col s12 center-align">
                <button id="fotoButton" type="button" class="btn waves-effect red darken-1">ADD FOTO</button>
                <script>
                    $('#fotoButton').on("click", function () {
                        $('#objCreateFoto').click();
                    });
                </script>
                <input required id="objCreateFoto" type="file" name="foto" style="display: none">
            </div>
            <div class="row"><p></p></div>
            <div class="col s12 center-align">
                <button class="btn waves-effect blue darken-1">GO</button>
                <input type="submit" value="GO" style="display: none">
            </div>
        </form>
    </div>
<?php $this->load->view('_inc/footer') ?>