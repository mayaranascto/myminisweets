<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Site Oficial My Mini Sweets">
        <meta name="author" content="Lucas Albuquerque & Mayara Nascimento">

        <?php $this->load->view('templates/importscss') ?>

        <title>Home</title>
</head>
    <body>
        <!-- Cabeçalho da Página -->
        <div id="header">
            <?php $this->load->view('templates/acesso') ?>
            <?php $this->load->view('templates/menu') ?>
        </div>
        <!-- /Cabeçalho da Página -->

        <!-- Banner com Fotos -->
        <?php $this->load->view('templates/banner') ?>
        <!-- Banner com Fotos -->

        <!-- Título "Apaixonados..."-->
        <?php $this->load->view('templates/tituloapaixonados') ?>
        <!-- /Título "Apaixonados..."-->

        <!-- Quadro Propaganda -->
        <?php $this->load->view('templates/propaganda') ?>
        <!-- /Quadro Propaganda -->

        <div class="ui icon button" data-content="Add users to your feed">
            <i class="add icon"></i>
        </div>

        <!-- Redes Sociais -->
        <?php $this->load->view('templates/redessociais') ?>
        <!-- /Redes Sociais -->

        <!-- Rodapé da Página -->
        <?php $this->load->view('templates/rodape') ?>
        <!-- Rodapé da Página -->

        <!-- JAVASCRIPT -->
        <?php $this->load->view('templates/importsjs') ?>
        <!-- JAVASCRIPT -->
    </body>
</html>
