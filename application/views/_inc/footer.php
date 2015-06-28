</main>
<footer class="page-footer card-panel blue darken-1">
    <div class="container navbar-fixed-bottom">

        <div class="row">
            <div class="col s6 offset-s3 center-align">
                <p class="white-text darken-2"> @Autor -> Igor Sodre © 2015</p>
            </div>
        </div>
    </div>
</footer>
<?php if ($this->session->userdata('mensagem') != NULL) { ?>

    <script>
        /*types of message = error, success, warning*/
        var mensagem = '<?=$this->session->userdata('mensagem')?>';
        var type = '<?=$this->session->userdata('mensagemTipo')?>';
        var subtittle = '<?=$this->session->userdata('subtitulo')?>';
        swal(mensagem, subtittle, type);
    </script>
    <?php
    $this->session->unset_userdata('mensagem');
    $this->session->unset_userdata('mensagemTipo');
    $this->session->unset_userdata('subtitulo');
} ?>


</body>
</html