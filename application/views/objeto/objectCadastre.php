<?php $this->load->view('_inc/header') ?>
    <div class="crud-objeto">
        <form id="add-obj-form" action="<?= base_url() . 'index.php/objeto/cadastroAction' ?>" method="post"
              enctype="multipart/form-data">
            <p>
                <label>
                    Identifição: <input type="text" name="identificacao"
                                        placeholder="insira uma identificao para o objeto">
                </label>
            </p>

            <p>
                <label>
                    Descrição:
                    <textarea cols="40" rows="3" name="descricao" form="add-obj-form"></textarea>
                </label>
            </p>

            <p>
                <input type="hidden" value="1">
            </p>

            <p>
                <label>
                    Foto: <input type="file" name="foto">
                </label>
            </p>
            <input type="submit" value="GO">
        </form>
    </div>

<?php $this->load->view('_inc/footer') ?>