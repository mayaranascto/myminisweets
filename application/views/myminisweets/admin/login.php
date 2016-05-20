<!DOCTYPE html>
<html>
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Área de Acesso</title>

    <!-- CSS -->
    <?php $this->load->view('templates/importscss') ?>

    <!-- CSS -->

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
            <li><a href="<?php echo base_url('Geral/foodtruck'); ?>" >Foodtruck</a></li>
            <li><a href="<?php echo base_url('Geral/produtos'); ?>">Produtos</a></li>
            <li><a href="<?php echo base_url('Geral/encomendas'); ?>">Encomendas</a></li>
            <li><a href="<?php echo base_url('Geral/contato'); ?>">Contato</a></li>
            <li><a href="<?php echo base_url('Geral/contato'); ?>" id="visited">Acesso</a></li>
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
          <h1>My Mini Sweets - Área de Acesso</h1>
          <p>Efetue o seu login e faça suas compras com tranquilidade!</p>
        </header>
        <hr class="separator">
      </div>
    </div>
    <!-- /Título My Mini Sweets Foodtruck -->

    <!-- Formulário de Login -->
    <?php $this->load->view('myminisweets/admin/templates/telalogin') ?>
    <!-- /Formulário de Login -->

    <!-- Redes Sociais -->
    <?php $this->load->view('templates/redessociais') ?>
    <!-- /Redes Sociais -->

    <!-- Rodapé da Página -->
    <?php $this->load->view('templates/rodape') ?>
    <!-- Rodapé da Página -->

    <!-- JAVASCRIPT -->
    <?php $this->load->view('myminisweets/admin/templates/importsjs') ?>
    <!-- /JAVASCRIPT -->
  </body>
</html>
