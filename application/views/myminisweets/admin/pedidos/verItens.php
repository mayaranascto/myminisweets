<div class="twelve wide column">
  <h1>Lista de Itens</h1>
  <div class="ui divider"></div>
  <br/>
  <div class="ui grid">
  <?php

    $tamplate = array(
      'table_open'  => '<table class="ui celled padded table">'
    );

    $this->table->set_template($tamplate);
    $this->table->set_heading('ID', 'Descrição', 'Quantidade');

    foreach ($itens as $linha){ ?>
      <?php
        $this->table->add_row(anchor("admin/Dashboard/verProduto/$linha->produtos_idprodutos",$linha->nome_produto), $linha->descricao, $linha->quantidade);
      ?>
    <?php }
    echo $this->table->generate();
    ?>
    <a href="<?php echo base_url('admin/Pedidos/verPedidos') ?>"><button class="ui grey button" tabindex="0" value="voltar">Voltar</button></a>
  </div>
</div>
