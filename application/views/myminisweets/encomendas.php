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
    <!-- Cabe�alho da P�gina -->
    <div id="header">
        <!-- //<?php //$this->load->view('templates/acesso') ?>//-->
        <div class="container">
            <!-- Menu inicial -->
            <div class="logo"><a href="<?php echo base_url('Welcome'); ?>"><img src="<?php echo base_url('assets/developer/imgs/logos/logo1.png'); ?>" alt="" /></a></div>
            <div class="mainmenu">
                <div id="mainmenu">
                    <ul class="sf-menu">
                        <li><a href="<?php echo base_url('Welcome'); ?>">In�cio</a></li>
                        <li><a href="<?php echo base_url('Geral/foodtruck'); ?>">Foodtruck</a></li>
                        <li><a href="<?php echo base_url('Geral/produtos'); ?>">Produtos</a></li>
                        <li><a href="<?php echo base_url('Geral/encomendas'); ?>" id="visited">Encomendas</a></li>
                        <li><a href="<?php echo base_url('Geral/contato'); ?>">Contato</a></li>
                        <li><a href="<?php echo base_url('Geral/login'); ?>" >Acesso</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Menu inicial -->
        </div>
    </div>
    <!-- /Cabe�alho da P�gina -->

    <!-- T�tulo My Mini Sweets Encomendas -->
    <div class="infobox">
        <div class="container info">
            <header>
                <h1>My Mini Sweets - Encomendas</h1>
                <p>Vem fazer a festa com a gente!</p>
            </header>
            <hr class="separator">
        </div>
    </div>
    <!-- /T�tulo My Mini Sweets Encomendas -->

    <!-- Redes Sociais -->
    <?php $this->load->view('templates/redessociais') ?>
    <!-- /Redes Sociais -->

    <!-- Rodap� da P�gina -->
    <?php $this->load->view('templates/rodape') ?>
    <!-- Rodap� da P�gina -->

    <!-- JAVASCRIPT -->
    <?php $this->load->view('templates/importsjs') ?>
    <!-- JAVASCRIPT -->
    </body>
</html>