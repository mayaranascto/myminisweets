<div class="ui container">
  <br>
  <div class="ui secondary menu">
    <div class="header item"><?php echo 'Bem vindo '.$this->auth->getLogin(); ?></div>
    <!--<a class="item">
    Home
  </a>
  <a class="item">
  Messages
</a>
<a class="item">
Friends
</a>-->
<div class="right menu">
  <!--<div class="item">
  <div class="ui icon input">
  <input type="text" placeholder="Search...">
  <i class="search link icon"></i>
</div>
</div>-->
<a class="ui item" href="<?php echo base_url('admin/Login/logout'); ?>">
  Sair
</a>
</div>
</div>
<div class="ui divider"></div>
<br>
<div class="ui grid">
  <div class="four wide column">
    <div class="ui secondary vertical pointing fluid menu">
      <a class="item" href="<?php echo base_url('admin/Dashboard/cadastroCliente') ?>">
        Clientes
      </a>
      <a class="item" href="<?php echo base_url('admin/Dashboard/cadastroProduto') ?>">
        Produtos
      </a>
      <div class="ui simple dropdown item">
        <i class="dropdown icon"></i>
        Pedidos
        <div class="menu">
          <a class="item" href="<?php echo base_url('admin/Pedidos/criarPedidoA'); ?>">Criar Pedido</a>
          <a class="item" href="<?php echo base_url('admin/Pedidos/gerenciarPedidos'); ?>">Gerenciar Pedidos</a>
        </div>
      </div>
    </div>
  </div>
