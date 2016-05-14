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
        <!-- //<?php //$this->load->view('templates/acesso') ?>//-->
        <div class="container">
            <!-- Menu inicial -->
            <div class="logo"><a href="<?php echo base_url('Welcome'); ?>"><img src="<?php echo base_url('assets/developer/imgs/logos/logo1.png'); ?>" alt="" /></a></div>
            <div class="mainmenu">
                <div id="mainmenu">
                    <ul class="sf-menu">
                        <li><a href="<?php echo base_url('Welcome'); ?>">Início</a></li>
                        <li><a href="<?php echo base_url('Geral/foodtruck'); ?>" id="visited">Foodtruck</a></li>
                        <li><a href="<?php echo base_url('Geral/produtos'); ?>">Produtos</a></li>
                        <li><a href="<?php echo base_url('Geral/encomendas'); ?>">Encomendas</a></li>
                        <li><a href="<?php echo base_url('Geral/contato'); ?>">Contato</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Menu inicial -->
        </div>
    </div>
    <!-- /Cabeçalho da Página -->

    <!-- Título My Mini Sweets Foodtruck -->
    <div class="infobox">
        <div class="container info">
            <header>
                <h1>My Mini Sweets Foodtruck</h1>
                <p>Venha conhecer de perto todas as delícias que a gente preparou especialmente pra você!</p>
            </header>
            <hr class="separator">
        </div>
    </div>
    <!-- /Título My Mini Sweets Foodtruck -->

    <!-- Postágens de Eventos -->
    <?php $this->load->view('templates/postagens') ?>
    <!-- /Postágens de Eventos -->

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